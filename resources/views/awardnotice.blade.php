<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Bank of Zambia Advice</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
			padding: 20px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}
		table td, table th {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}
		table th {
			background-color: #f2f2f2;
		}
		h1 {
			font-size: 20px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
    <div style="text-align: left;">
        <p>Tel. 228888/228903/20</p>
    </div>

    <div style="text-align: right;">
        <p>Bank of Zambia</p>
        <p>P.O. Box 30080</p>
        <p>LUSAKA 10101</p>
        <p><strong>Date:</strong> <span style="color: blue;">{{$data['settlementDate']}}</span></p>
    </div>
	<div style="text-align: center;">
        <h1>Awarded Advice</h1>
    </div>



    </div>
    <div style="text-align: left;">
        <p><strong>To:</strong></p>
        <p><span style="color: blue;">{{$data['name']}}</span><br>
        <span style="color: blue;">{{$data['address']}}</span><br>
        </p>
    </div><br><br>

	<table>
		<tr>
			<th>CSD Account</th>
			<td><span style="color: blue;">{{$data['csd']}}</span> </td>
		</tr>
		<tr>
			<th>Auction Name</th>
			<td> <span style="color: blue;">{{$data['issueNo']}}</span> </td>
		</tr>
		<tr>
			<th>Security Name</th>
			<td><span style="color: blue;">{{$data['securityName']}}</span> </td>
		</tr>
		<tr>
			<th>Issue No</th>
			<td> <span style="color: blue;">{{$data['issueNo']}}</span> <span style="color: blue;">{{$data['duration']}}</span> </td>
		</tr>
		<tr>
			<th>Settlement Date</th>
			<td><span style="color: blue;">{{$data['settlementDate']}}</span> </td>
		</tr>
		<tr>
			<th>Maturity Date</th>
			<td><span style="color: blue;">{{$data['maturityDate']}}</span> </td>
		</tr>
	</table>
	<table>
		<tr>
			<th>Amount</th>
			<th>Price</th>
			<th>Cost</th>
            <th>Discount</th>
		</tr>
		<tr>
			<td><span style="color: blue;">{{$data['faceValue']}}</span> </td>
			<td><span style="color: blue;">{{$data['bprice']}}</span></td>
			<td><span style="color: blue;">{{$data['price']}}</span> </td>
            <td><span style="color: blue;">{{$data['discount']}}</span> </td>
		</tr>
	</table>
	<p>The amount <span style="color: blue;">{{$data['price']}}</span> will be debited from your account at <span style="color: blue;">Bonds Management System</span>, being the total cost of successful bids. Your securities are held electronically in safe custody at the Bank of Zambia.</p>
	<p><em>Senior Economist - GRZ Securities Trading, FOR BANK OF ZAMBIA</em></
