<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.6.0/jspdf.umd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        input[type="date"] {
            width: 20%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius:  5px;
            box-sizing: border-box;
        } 
        textarea {
            width: 100%;
            height: 100px; /* Adjust height as needed */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"] {
            width: 25%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius:  5px;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }
        button[type="submit"] {
            background-color: #28a745; /* Green for Submit */
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        button#printButton {
            background-color: #007bff; /* Blue for Print */
        }
        button#printButton:hover {
            background-color: #0056b3;
        }
        .category-header {
            font-weight: bold;
            font-size: 1.2em;
            padding-top: 10px;
            background-color: #f2f2f2;
            text-align: left;
            padding: 8px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .total-score {
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            display: none; /* Hide total score in normal view */
        }
        .star-rating {
            font-size: 30px;
        }
        .star-rating span {
            cursor: pointer;
        }
        .star-rating .selected {
            color: orange;
        }
        
        .print-score {
            display: none; /* Hide print score in normal view */
        }
        @media print {
            #appraisal-buttons {
                display: none;
            }
            .star-rating {
                display: none;
            }
            .print-score {
                display: inline-block; /* Display print score in print view */
            }
            .total-score {
                display: block; /* Display total score in print view */
            }
            /* Hide the navigation bar and any other elements you don't want in the print view */
            .navbar, .header, .footer, .extra-element {
                display: none;
            }
            .navbar {
                display: none;
            }
        }
    </style
</head>
<body>
<h1 style="font-size: 25pt">Performance Appraisal for Staff from Peer (From Peer)</h1>
<form method="post" action="peer_saved.php" id="peer">
    <input type="hidden" name="form_type" value="peer">
    <div class="mb-3">
        <label for="employee">Employee Name:</label>
        <input type="text" name="employee" id="employee" required>
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required>
    </div>

    <div class="mb-3">
        <label for="assignment">Place of Assignment:</label>
        <input type="text" name="assignment" id="assignment" required>
        <label for="contract">Contract Period:</label>
        <input type="date" name="contract" id="contract" required>
        <label for="end_contract">End Period:</label>
        <input type="date" name="end_contract" id="end_contract" required>
    </div>

    <table>
        <tr>
            <th>Description</th>
            <th>Score</th>
        </tr>
        <!-- Creativity and Innovation -->
        <tr>
            <th colspan="2" class="category-header">Creativity and Innovation</th>
        </tr>
        <tr>
            <td>1. Recommends and implements reforms contributing to the attainment of the office goals and objectives.</td>
            <td>
                <div class="star-rating" id="creativity_and_innovation_1"></div>
                <span class="print-score" data-rating-id="creativity_and_innovation_1"></span>
                <input type="hidden" name="creativity_and_innovation_1" id="creativity_and_innovation_1_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. When an innovation/modification/enhancement is introduced, builds on it by adding ideas or makes adjustments for better implementation.</td>
            <td>
                <div class="star-rating" id="creativity_and_innovation_2"></div>
                <span class="print-score" data-rating-id="creativity_and_innovation_2"></span>
                <input type="hidden" name="creativity_and_innovation_2" id="creativity_and_innovation_2_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. When given a problem to solve, sees it as a challenge and gets excited.</td>
            <td>
                <div class="star-rating" id="creativity_and_innovation_3"></div>
                <span class="print-score" data-rating-id="creativity_and_innovation_3"></span>
                <input type="hidden" name="creativity_and_innovation_3" id="creativity_and_innovation_3_value" value="">
            </td>
        </tr>

        <!-- Critical and Systemic Thinking -->
        <tr>
            <th colspan="2" class="category-header">Critical and Systemic Thinking</th>
        </tr>
        <tr>
            <td>1. Anticipates changes when planning a project and makes contingency plans.</td>
            <td>
                <div class="star-rating" id="critical1Stars"></div>
                <span class="print-score" data-rating-id="critical1Stars"></span>
                <input type="hidden" name="critical1Stars" id="critical1Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. Systematically analyzes problems and issues for effective solutions.</td>
            <td>
                <div class="star-rating" id="critical2Stars"></div>
                <span class="print-score" data-rating-id="critical2Stars"></span>
                <input type="hidden" name="critical2Stars" id="critical2Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. Checks the nature and sources of data or information before deciding.</td>
            <td>
                <div class="star-rating" id="critical3Stars"></div>
                <span class="print-score" data-rating-id="critical3Stars"></span>
                <input type="hidden" name="critical3Stars" id="critical3Stars_value" value="">
            </td>
        </tr>

        <!-- Environmental Acumen -->
        <tr>
            <th colspan="2" class="category-header">Environmental Acumen</th>
        </tr>
        <tr>
            <td>1. Maximizes the use of scarce resources to achieve expected outputs.</td>
            <td>
                <div class="star-rating" id="environmental1Stars"></div>
                <span class="print-score" data-rating-id="environmental1Stars"></span>
                <input type="hidden" name="environmental1Stars" id="environmental1Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. Networks and establishes strategic alliances with stakeholders.</td>
            <td>
                <div class="star-rating" id="environmental2Stars"></div>
                <span class="print-score" data-rating-id="environmental2Stars"></span>
                <input type="hidden" name="environmental2Stars" id="environmental2Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. Sees opportunities to effectively pursue goals.</td>
            <td>
                <div class="star-rating" id="environmental3Stars"></div>
                <span class="print-score" data-rating-id="environmental3Stars"></span>
                <input type="hidden" name="environmental3Stars" id="environmental3Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>4. Attends to activities that involve relating to stakeholders.</td>
            <td>
                <div class="star-rating" id="environmental4Stars"></div>
                <span class="print-score" data-rating-id="environmental4Stars"></span>
                <input type="hidden" name="environmental4Stars" id="environmental4Stars_value" value="">
            </td>
        </tr>

        <!-- Honesty and Integrity -->
        <tr>
            <th colspan="2" class="category-header">Honesty and Integrity</th>
        </tr>
        <tr>
            <td>1. Mindful of set deadlines for tasks.</td>
            <td>
                <div class="star-rating" id="honesty1Stars"></div>
                <span class="print-score" data-rating-id="honesty1Stars"></span>
                <input type="hidden" name="honesty1Stars" id="honesty1Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. Reports to work regularly.</td>
            <td>
                <div class="star-rating" id="honesty2Stars"></div>
                <span class="print-score" data-rating-id="honesty2Stars"></span>
                <input type="hidden" name="honesty2Stars" id="honesty2Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. Works expeditiously to achieve results on time.</td>
            <td>
                <div class="star-rating" id="honesty3Stars"></div>
                <span class="print-score" data-rating-id="honesty3Stars"></span>
                <input type="hidden" name="honesty3Stars" id="honesty3Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>4. Makes use of official time and resources wisely.</td>
            <td>
                <div class="star-rating" id="honesty4Stars"></div>
                <span class="print-score" data-rating-id="honesty4Stars"></span>
                <input type="hidden" name="honesty4Stars" id="honesty4Stars_value" value="">
            </td>
        </tr>

        <!-- Judgement -->
        <tr>
            <th colspan="2" class="category-header">Judgement</th>
        </tr>
        <tr>
            <td>1. Weighs matters judiciously and takes necessary action for decisions.</td>
            <td>
                <div class="star-rating" id="judgement1Stars"></div>
                <span class="print-score" data-rating-id="judgement1Stars"></span>
                <input type="hidden" name="judgement1Stars" id="judgement1Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. Critically evaluates information for relevant details.</td>
            <td>
                <div class="star-rating" id="judgement2Stars"></div>
                <span class="print-score" data-rating-id="judgement2Stars"></span>
                <input type="hidden" name="judgement2Stars" id="judgement2Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. Uses judgement and discretion in making decisions.</td>
            <td>
                <div class="star-rating" id="judgement3Stars"></div>
                <span class="print-score" data-rating-id="judgement3Stars"></span>
                <input type="hidden" name="judgement3Stars" id="judgement3Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>4. Considers the likely effects of decisions on the department and its operations.</td>
            <td>
                <div class="star-rating" id="judgement4Stars"></div>
                <span class="print-score" data-rating-id="judgement4Stars"></span>
                <input type="hidden" name="judgement4Stars" id="judgement4Stars_value" value="">
            </td>
        </tr>

        <!-- Leadership -->
        <tr>
            <th colspan="2" class="category-header">Leadership</th>
        </tr>
        <tr>
            <td>1. Provides clear directions and instructions.</td>
            <td>
                <div class="star-rating" id="leadership1Stars"></div>
                <span class="print-score" data-rating-id="leadership1Stars"></span>
                <input type="hidden" name="leadership1Stars" id="leadership1Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>2. Shows confidence and self-assurance in managing tasks.</td>
            <td>
                <div class="star-rating" id="leadership2Stars"></div>
                <span class="print-score" data-rating-id="leadership2Stars"></span>
                <input type="hidden" name="leadership2Stars" id="leadership2Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>3. Motivates and inspires team members to achieve goals.</td>
            <td>
                <div class="star-rating" id="leadership3Stars"></div>
                <span class="print-score" data-rating-id="leadership3Stars"></span>
                <input type="hidden" name="leadership3Stars" id="leadership3Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>4. Provides constructive feedback and guidance.</td>
            <td>
                <div class="star-rating" id="leadership4Stars"></div>
                <span class="print-score" data-rating-id="leadership4Stars"></span>
                <input type="hidden" name="leadership4Stars" id="leadership4Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>5. Leads by example and demonstrates ethical behavior.</td>
            <td>
                <div class="star-rating" id="leadership5Stars"></div>
                <span class="print-score" data-rating-id="leadership5Stars"></span>
                <input type="hidden" name="leadership5Stars" id="leadership5Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>6. Builds and maintains effective teams.</td>
            <td>
                <div class="star-rating" id="leadership6Stars"></div>
                <span class="print-score" data-rating-id="leadership6Stars"></span>
                <input type="hidden" name="leadership6Stars" id="leadership6Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>7. Effectively delegates tasks and responsibilities.</td>
            <td>
                <div class="star-rating" id="leadership7Stars"></div>
                <span class="print-score" data-rating-id="leadership7Stars"></span>
                <input type="hidden" name="leadership7Stars" id="leadership7Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>8. Manages conflicts and resolves issues promptly.</td>
            <td>
                <div class="star-rating" id="leadership8Stars"></div>
                <span class="print-score" data-rating-id="leadership8Stars"></span>
                <input type="hidden" name="leadership8Stars" id="leadership8Stars_value" value="">
            </td>
        </tr>
        <tr>
            <td>9. Demonstrates sound decision-making and problem-solving skills.</td>
            <td>
                <div class="star-rating" id="leadership9Stars"></div>
                <span class="print-score" data-rating-id="leadership9Stars"></span>
                <input type="hidden" name="leadership9Stars" id="leadership9Stars_value" value="">
            </td>
        </tr>

        <tr>
            <td>Total Score:</td>
            <td>
                <input type="text" id="totalScore" name="totalScore" value="0" readonly>
            </td>
        </tr>
        

    </table>

    <div style="margin-bottom: 0.14in">
        <label for="comments"><b>Comments for Development Purposes:</b></label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br>
    </div>

    <label for="assessed_by">Assessed by:</label>
    <input type="text" id="assessed_by" name="assessed_by" style="width: 60%;">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date">
    <p style="line-height: 100%; margin-left: 2.5in; margin-bottom: 0in">
        <font face="Cambria, serif">Peer's Name</font>
    </p>

    <div id="appraisal-buttons">
        <button type="submit" class="btn-primary">Submit Appraisal</button>
        <button type="button" class="btn-primary" onclick="window.print();">Print</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const starRatings = document.querySelectorAll('.star-rating');
        const totalScoreElement = document.getElementById('totalScore');
        const maxScore = 135; // Maximum possible score

        // Initialize star ratings
        starRatings.forEach(rating => {
            for (let i = 0; i < 5; i++) {
                const span = document.createElement('span');
                span.innerHTML = '&#9733;';
                span.addEventListener('click', function() {
                    handleStarClick(rating, span);
                });
                rating.appendChild(span);
            }
        });

        function handleStarClick(rating, clickedStar) {
            clearSelected(rating);
            clickedStar.classList.add('selected');
            let previousSibling = clickedStar.previousElementSibling;
            while (previousSibling) {
                previousSibling.classList.add('selected');
                previousSibling = previousSibling.previousElementSibling;
            }
            updateTotalScore();
        }

        function clearSelected(rating) {
            const stars = rating.querySelectorAll('span');
            stars.forEach(star => star.classList.remove('selected'));
        }

        function updateTotalScore() {
            let totalScore = 0;
            starRatings.forEach(rating => {
                const selectedStars = rating.querySelectorAll('.selected').length;
                totalScore += selectedStars;
                const hiddenInput = document.getElementById(`${rating.id}_value`);
                if (hiddenInput) hiddenInput.value = selectedStars;
            });
            totalScoreElement.value = totalScore;
            updatePrintView();
        }

        function updatePrintView() {
            const printScoreElements = document.querySelectorAll('.print-score');
            printScoreElements.forEach(element => {
                const ratingId = element.getAttribute('data-rating-id');
                const selectedStars = document.querySelectorAll(`#${ratingId} .selected`).length;
                element.textContent = selectedStars;
            });
        }

        window.onbeforeprint = updatePrintView;

        // Form submission
        const form = document.getElementById('peer');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Validate form fields
            const requiredFields = ['employee', 'position', 'assignment', 'contract', 'end_contract', 'assessed_by', 'date'];
            const isValid = requiredFields.every(fieldId => document.getElementById(fieldId).value.trim() !== '');
            
            if (!isValid) {
                alert('Please fill in all fields.');
                return;
            }

            // Submit the form data
            const formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Form submitted successfully');
                    form.reset();
                    totalScoreElement.value = '0';
                    clearSelectedStars();
                } else {
                    alert('Failed to submit form: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error submitting form', error);
                alert('An error occurred while submitting the form.');
            });
        });

        function clearSelectedStars() {
            starRatings.forEach(rating => {
                const stars = rating.querySelectorAll('.selected');
                stars.forEach(star => star.classList.remove('selected'));
            });
        }
    });
    function generatePDF() {
            const { jsPDF } = window.jspdf;

            // Create a new instance of jsPDF
            const doc = new jsPDF();

            // Get form data
            const form = document.getElementById('peer-form');
            const employee = form.elements['employee'].value;
            const position = form.elements['position'].value;
            const assignment = form.elements['assignment'].value;
            const contract = form.elements['contract'].value;
            const endContract = form.elements['end_contract'].value;
            const comments = form.elements['comments'].value;
            const assessedBy = form.elements['assessed_by'].value;
            const date = form.elements['date'].value;
            const totalScore = form.elements['totalScore'].value;

            // Add form data to PDF
            doc.setFontSize(12);
            doc.text('Peer Evaluation Form', 10, 10);
            doc.text(`Employee Name: ${employee}`, 10, 20);
            doc.text(`Position: ${position}`, 10, 30);
            doc.text(`Place of Assignment: ${assignment}`, 10, 40);
            doc.text(`Contract Period: ${contract}`, 10, 50);
            doc.text(`End Period: ${endContract}`, 10, 60);
            doc.text(`Comments: ${comments}`, 10, 70);
            doc.text(`Assessed by: ${assessedBy}`, 10, 80);
            doc.text(`Date: ${date}`, 10, 90);
            doc.text(`Total Score: ${totalScore}`, 10, 100);

            // Generate PDF and trigger download
            doc.save('peer_evaluation_form.pdf');
        }
   
</script>

</body>
</html>
