<head>
    <title>EDIT TRANSACTION</title>
</head>
<body>
    <h1>EDIT TRANSACTION</h1>

    <form action="{{ route('updateTransaction', ['id' => $transaction->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="transaction_title">Transaction Title:</label>
        <input type="text" id="transaction_title" name="transaction_title" value="{{ $transaction->transaction_title }}" required><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $transaction->description }}" required><br>
        <label for="status">Status:</label>
        <select type="select" id="status" name="status" value="{{ $transaction->status }}" required>
            <option value="successful">Successful</option>
            <option value="declined">Declined</option>
        </select><br>
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="{{ $transaction->total_amount }}" required><br>
        <label for="transaction_number">Transaction Number:</label>
        <input type="text" id="transaction_number" name="transaction_number" value="{{ $transaction->transaction_number }}" required><br>
        
        <button type="submit">Update Transaction</button>
        
    </form>
</body>
