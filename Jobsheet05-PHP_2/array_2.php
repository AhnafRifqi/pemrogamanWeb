<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array Asosiatif dengan Styling</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #5c67f2;
            padding-bottom: 5px;
            display: inline-block;
        }
        table {
            width: 50%; 
            border-collapse: collapse; 
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            background-color: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #5c67f2; 
            color: white;
            font-weight: bold;
            width: 30%; 
        }
        
        
    </style>
</head>
<body>

<h2>Data Dosen (Array Asosiatif)</h2>

<?php
   
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];
?>

<table>
    <thead>
        <tr>
            <th>Kunci (Key)</th>
            <th>Nilai (Value)</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        foreach ($Dosen as $key => $value) {
            echo "<tr>";
            
            echo "<td>" . ucwords(str_replace('_', ' ', $key)) . "</td>"; 
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

</body>
</html>