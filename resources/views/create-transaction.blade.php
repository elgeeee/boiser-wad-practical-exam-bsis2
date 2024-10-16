<head>
    <title>CREATE TRANSACTION</title>
</head>
<body>
    <h1>CREATE TRANSACTION</h1>

    <form action="{{ route('createTransaction') }}" method="GET">
        @method('GET')
        <button type="submit">Create Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back to Transactions</button>
    </form>

    <form action="{{ route('storeTransaction') }}" method="POST">
        @method('POST')
        @csrf
        <label for="transaction_title">Transaction Title:</label>
        <input type="text" id="transaction_title" name="transaction_title" required><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>
        <label for="status">Status:</label>
        <select type="select" id="status" name="status" required>
            <option value="successful">Successful</option>
            <option value="declined">Declined</option>
        </select><br>
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" required><br>
        <label for="transaction_number">Transaction Number:</label>
        <input type="text" id="transaction_number" name="transaction_number" required><br>
        
        <button type="submit">Create Transaction</button>
        
    </form>
</body>
