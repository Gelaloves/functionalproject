
<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=request_form', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare('
            INSERT INTO peer (
                employee_name, position, place_of_assignment, contract_period, end_period, comments, assessed_by, date, creativity_and_innovation_1, creativity_and_innovation_2, creativity_and_innovation_3, critical1Stars, critical2Stars, critical3Stars, environmental1Stars, environmental2Stars, environmental3Stars, environmental4Stars, honesty1Stars, honesty2Stars, honesty3Stars, honesty4Stars, judgement1Stars, judgement2Stars, judgement3Stars, judgement4Stars, leadership1Stars, leadership2Stars, leadership3Stars, leadership4Stars, leadership5Stars, leadership6Stars, leadership7Stars, leadership8Stars, leadership9Stars, totalScore
            ) VALUES (
                :employee_name, :position, :place_of_assignment, :contract_period, :end_period, :comments, :assessed_by, :date, :creativity_and_innovation_1, :creativity_and_innovation_2, :creativity_and_innovation_3, :critical1Stars, :critical2Stars, :critical3Stars, :environmental1Stars, :environmental2Stars, :environmental3Stars, :environmental4Stars, :honesty1Stars, :honesty2Stars, :honesty3Stars, :honesty4Stars, :judgement1Stars, :judgement2Stars, :judgement3Stars, :judgement4Stars, :leadership1Stars, :leadership2Stars, :leadership3Stars, :leadership4Stars, :leadership5Stars, :leadership6Stars, :leadership7Stars, :leadership8Stars, :leadership9Stars, :totalScore
            )
        ');

        // Bind parameters
        $params = [
            ':employee_name' => $_POST['employee'],
            ':position' => $_POST['position'],
            ':place_of_assignment' => $_POST['assignment'],
            ':contract_period' => $_POST['contract'],
            ':end_period' => $_POST['end_contract'],
            ':comments' => $_POST['comments'],
            ':assessed_by' => $_POST['assessed_by'],
            ':date' => $_POST['date'],
            ':creativity_and_innovation_1' => $_POST['creativity_and_innovation_1'],
            ':creativity_and_innovation_2' => $_POST['creativity_and_innovation_2'],
            ':creativity_and_innovation_3' => $_POST['creativity_and_innovation_3'],
            ':critical1Stars' => $_POST['critical1Stars'],
            ':critical2Stars' => $_POST['critical2Stars'],
            ':critical3Stars' => $_POST['critical3Stars'],
            ':environmental1Stars' => $_POST['environmental1Stars'],
            ':environmental2Stars' => $_POST['environmental2Stars'],
            ':environmental3Stars' => $_POST['environmental3Stars'],
            ':environmental4Stars' => $_POST['environmental4Stars'],
            ':honesty1Stars' => $_POST['honesty1Stars'],
            ':honesty2Stars' => $_POST['honesty2Stars'],
            ':honesty3Stars' => $_POST['honesty3Stars'],
            ':honesty4Stars' => $_POST['honesty4Stars'],
            ':judgement1Stars' => $_POST['judgement1Stars'],
            ':judgement2Stars' => $_POST['judgement2Stars'],
            ':judgement3Stars' => $_POST['judgement3Stars'],
            ':judgement4Stars' => $_POST['judgement4Stars'],
            ':leadership1Stars' => $_POST['leadership1Stars'],
            ':leadership2Stars' => $_POST['leadership2Stars'],
            ':leadership3Stars' => $_POST['leadership3Stars'],
            ':leadership4Stars' => $_POST['leadership4Stars'],
            ':leadership5Stars' => $_POST['leadership5Stars'],
            ':leadership6Stars' => $_POST['leadership6Stars'],
            ':leadership7Stars' => $_POST['leadership7Stars'],
            ':leadership8Stars' => $_POST['leadership8Stars'],
            ':leadership9Stars' => $_POST['leadership9Stars'],
            ':totalScore' => $_POST['totalScore']
        ];

<<<<<<< HEAD
        $stmt->execute($params);

        echo json_encode(['success' => true]);
=======
    // Escape and fetch other POST variables
    $employee = $conn->real_escape_string($_POST['employee']);
    $position = $conn->real_escape_string($_POST['position']);
    $assignment = $conn->real_escape_string($_POST['assignment']);
    $contract = $conn->real_escape_string($_POST['contract']);
    $comments = $conn->real_escape_string($_POST['comments']);
    $assessed_by = $conn->real_escape_string($_POST['assessed_by']);
    $date = !empty($_POST['date']) ? $conn->real_escape_string($_POST['date']) : date('Y-m-d'); // Default to current date if not provided
    $total_score = intval($_POST['total_score']);

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO peer (employee_name, position, place_of_assignment, contract_period, comments, assessed_by, date, total_score) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("sssssssi", $employee, $position, $assignment, $contract, $comments, $assessed_by, $date, $total_score);
    
    // Execute SQL query
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
>>>>>>> 9821a928de678038fdc605d2c6ca5b55bfd5982b
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
