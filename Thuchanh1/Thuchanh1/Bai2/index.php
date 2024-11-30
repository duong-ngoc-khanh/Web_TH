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
            $current_question['answer'] = substr($line, 8);
        }
    }
    if (!empty($current_question)) {
        $questions[] = $current_question;
    }
    fclose($file);
} else {
    die("Không thể mở tệp tin!");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <form action="submit.php" method="post">
    <?php foreach ($questions as $index => $q): ?>
        <h3><?php echo $q['question']; ?></h3>
        <?php foreach ($q['options'] as $option): ?>
            <label>
                <input type="radio" name="question_<?php echo $index; ?>" value="<?php echo $option[0]; ?>"> 
                <?php echo $option; ?>
            </label><br>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <button type="submit">Nộp bài</button>
    </form>
</body>
</html>
