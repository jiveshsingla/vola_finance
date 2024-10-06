<h1>Transactions with Balance After Each Transaction</h1>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Balance After</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction['date'] }}</td>
            <td>{{ $transaction['amount'] }}</td>
            <td>{{ $transaction['type'] }}</td>
            <td>{{ $transaction['balance_after'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
