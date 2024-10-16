<head>
    <title>TRANSACTION RECEIPT</title>
</head>
<body>
    <h1>TRANSACTION RECEIPT</h1>
        <div>Transaction Title: {{$transaction->transaction_title}}</div>
        <div>Description: {{$transaction->description}}</div>
        <div>Status: {{$transaction->status}}</div>
        <div>Total Amount: {{$transaction->total_amount}}</div>
        <div>Transaction Number: {{$transaction->transaction_number}}</div>
    <hr>
    <form action="{{ route('deleteTransaction', ['id' => $Transaction->id] )}}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this Transaction?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back to Transactions</button>
    </form>

    <form action="{{ route('editTransaction', ['id' => $Transaction->id]) }}" method="GET">
        <button type="submit">
            Edit Transaction</button>
    </form>
</body>