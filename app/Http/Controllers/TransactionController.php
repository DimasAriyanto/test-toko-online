<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\PaymentMethod;
use App\PaymentStatus;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('product', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhere('status', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $transactions = $query->paginate(10);
        return view('dashboard.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::select(['id', 'name'])->get();
        $users = User::select(['id', 'name'])->get();
        $payments = PaymentMethod::cases();
        return view('dashboard.transactions.create', compact('products', 'users', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTransactionRequest $request)
    {
        try {
            $data = $request->validated();

            $transactions = Transaction::create([
                'user_id' => $data['user'],
                'product_id' => $data['product'],
                'payment_method' => $data['payment'],
                'status' => 'process'
            ]);

            if ($transactions) {
                return redirect()->route('transaction.index')->with('status', 'Transactions seccess created!');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        try {
            return view('dashboard.transactions.view', compact('transaction'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        try {
            $products = Product::select(['id', 'name'])->get();
            $users = User::select(['id', 'name'])->get();
            $payments = PaymentMethod::cases();
            $payment_status = PaymentStatus::cases();

            return view('dashboard.transactions.edit', compact('transaction', 'products', 'users', 'payments', 'payment_status'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        try {
            $data = $request->validated();

            $update = $transaction->update([
                'user_id' => $data['user'],
                'product_id' => $data['product'],
                'payment_method' => $data['payment_method'],
                'status' => $data['status']
            ]);

            if ($update) {
                return redirect()->route('transaction.index')->with('status', 'Transactions seccess updated!');
            }
        } catch (Exception $e) {
            return redirect()->route('transaction.index')->with('error', 'Failed updated transactions ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return redirect()->route('transaction.index')->with('status', 'Transactions seccess deelted!');
        } catch (Exception $e) {
            return redirect()->route('transaction.index')->with('error', 'Failed deleted transactions ' . $e->getMessage());
        }
    }
}
