<table>

    <TR>
        <td>name </td>
        <td>:</td>
        <td>{{ session('username') }}</td>
    </TR>
    <tR>
        <td>Balance</td>
        <td>:</td>
        <td>{{ session('balance')['balance'] }}</td>
    </TR>
<tr>
    <td><form action="{{route('addAmount')}}" method="get">
        <input type="text" name="amount" placeholder="Enter Amount" id="amount">
        <input type="submit" value="Add Balance" id="addBalance">
    </form></td>
</tr>
<tr>
    <td><form action="{{route('credit')}}" method="get">
        <input type="text" name="amount" placeholder="Enter Amount" id="amount">
        <input type="submit" value="Withdraw" >
    </form></td>
</tr>
</table>
