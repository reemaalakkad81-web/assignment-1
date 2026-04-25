<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تقرير درجات الطلاب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #733270;
            color: white;
        }
        .stats {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .stats p {
            margin: 8px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1> تقرير درجات الطلاب</h1>

    <?php
   
    $students = [
        ["name" => " محمد ناصر", "grade" => 95, "age" => 20],
        ["name" => "ريما كمال", "grade" => 82, "age" => 21],
        ["name" => "عيسى عيسى", "grade" => 74, "age" => 19],
        ["name" => "عبدالله درويش", "grade" => 68, "age" => 22],
        ["name" => "نجوى ابراهيم", "grade" => 45, "age" => 20]
    ];
    function calculateStatus($grade) {
        if ($grade >= 90) {
            return "ممتاز";
        } elseif ($grade >= 80) {
            return "جيد جدا";
        } elseif ($grade >= 70) {
            return "جيد";
        } elseif ($grade >= 60) {
            return "مقبول";
        } else {
            return "راسب";
        }
    }

   
    $grades = array_column($students, "grade");
    $maxGrade = max($grades);
    $minGrade = min($grades);
    $averageGrade = array_sum($grades) / count($grades);

    $passCount = 0;
    foreach ($students as $student) {
        if ($student["grade"] >= 60) {
            $passCount++;
        }
    }
    ?>

   
    <table>
        <tr>
            <th>اسم الطالب</th>
            <th>الدرجة</th>
            <th>العمر</th>
            <th>الحالة</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student["name"]; ?></td>
            <td><?php echo $student["grade"]; ?></td>
            <td><?php echo $student["age"]; ?></td>
            <td><?php echo calculateStatus($student["grade"]); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="stats">
        <p><strong> أعلى درجة:</strong> <?php echo $maxGrade; ?></p>
        <p><strong> أقل درجة:</strong> <?php echo $minGrade; ?></p>
        <p><strong> معدل الدرجات:</strong> <?php echo round($averageGrade, 2); ?></p>
        <p><strong> عدد الطلاب الناجحين:</strong> <?php echo $passCount; ?></p>
    </div>
</div>

</body>
</html>