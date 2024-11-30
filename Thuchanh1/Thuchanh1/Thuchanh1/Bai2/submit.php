<?php


$questions = [];
$file = fopen("questions.txt", "r");
if ($file) {
    $current_question = [];
    while (($line = fgets($file)) !== false) {
        $line = trim($line);
        if (strpos($line, 'Câu') === 0) {
            if (!empty($current_question)) {
                $questions[] = $current_question;
                $current_question = [];
            }
            $current_question['question'] = $line;
        } elseif (preg_match('/^[A-D]\./', $line)) {
            $current_question['options'][] = $line;
        } elseif (strpos($line, 'Đáp án:') === 0) {
            $current_question['answer'] = trim(substr($line, 8)); /
        }
    }
    if (!empty($current_question)) {
        $questions[] = $current_question;
    }
    fclose($file);
} else {
    die("Không thể mở tệp tin!");
}


$total = count($questions);
$correct = 0;
$results = [];

foreach ($questions as $index => $q) {
   
    if (!isset($_POST["question_$index"])) {
        $results[] = [
            'question' => $q['question'],
            'selected' => null,
            'correct' => $q['answer']
        ];
        continue;
    }

  
    $selected = trim($_POST["question_$index"]);
    

    $results[] = [
        'question' => $q['question'],
        'selected' => $selected,
        'correct' => $q['answer']
    ];


    if (strcasecmp($selected, $q['answer']) === 0) {
        $correct++; 
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
</head>
<body>
    <h1>Kết quả bài thi</h1>
    <h2>Chi tiết:</h2>
    <ul>
        <?php foreach ($results as $result): ?>
            <li>
                <strong><?php echo $result['question']; ?></strong><br>
                Bạn chọn: <?php echo $result['selected'] ?? '<em>Không chọn</em>'; ?><br>
                Đáp án đúng: <?php echo $result['correct']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Làm lại</a>
</body>
</html>
