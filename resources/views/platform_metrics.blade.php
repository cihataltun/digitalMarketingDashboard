<!DOCTYPE html>
<html>
<head>
    <title>Platform Metrics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Platform Metrics</h1>
        <h2>Platform: {{ $ads->first()->platform }}</h2>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Total Impressions</th>
                    <th>Total Clicks</th>
                    <th>Total Spend</th>
                    <th>Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalImpressions }}</td>
                    <td>{{ $totalClicks }}</td>
                    <td>{{ $totalSpend }}</td>
                    <td>{{ $totalRevenue }}</td>
                </tr>
            </tbody>
        </table>
        <h2>Ads</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Impressions</th>
                    <th>Clicks</th>
                    <th>Spend</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ads as $ad)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($ad->date)->locale('tr')->isoFormat('D MMMM YYYY') }}</td>
                    <td>{{ $ad->impressions }}</td>
                    <td>{{ $ad->clicks }}</td>
                    <td>{{ $ad->spend }}</td>
                    <td>{{ $ad->revenue }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
