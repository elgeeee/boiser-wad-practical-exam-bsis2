<h1>TRANSACTIONS RECEIPTS</h1>

    <form action="{{ route('createTransaction') }}" method="GET">
        @method('GET')
        <button type="submit">Create Transaction</button>
    </form>

    @foreach ($transactions as $transaction)
        <div>Transaction Title: {{$transaction->transaction_title}}</div>
        <div>Description: {{$transaction->description}}</div>
        <div>Status: {{$transaction->status}}</div>
        <div>Total Amount: {{$transaction->total_amount}}</div>
        <div>Transaction Number: {{$transaction->transaction_number}}</div>

        <form action="{{ route('viewTransactions', ['id' => $transaction->id]) }}" method="GET">
            <button type="submit">
                View Transaction</button>
        </form>
        <hr>
    @endforeach