<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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
            display: none;
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
            display: none;
        }
        @media print {
            #appraisal-buttons {
                display: none;
            }
            .star-rating {
                display: none;
            }
            .print-score {
                display: inline-block;
            }
            .total-score {
                display: block;
            }
        }
    </style>
</head>
<body>
<h1>Performance-Appraisal-for-Staff-from-Peer</h1>
<h2>(From Peer)</h2>

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

    <p style="line-height: 100%; margin-right: -0.32in; margin-bottom: 0.14in">
        <font face="Cambria, serif">Kindly provide evaluation for your staff
            based on their skill and trait factors.</font></p>
    <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><font face="Cambria, serif"><font size="2" style="font-size: 10pt"><b>Numerical
                &amp; Adjectival Rating: </b></font></font><font face="Cambria, serif"><font size="2" style="font-size: 10pt">5
                &ndash; Outstanding, 4 &ndash; Very Satisfactory, 3 &ndash;
                Satisfactory, 2 &ndash; Unsatisfactory, 1 &ndash; Poor</font></font></p>
    <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><br/></p>
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
                <input type="hidden" name="creativity_and_innovation_rating_1" id="creativity_and_innovation_1" value="">
                <span class="print-score" data-rating-id="creativity_and_innovation_1"></span>
            </td>
        </tr>
        <tr>
            <td>2. When an innovation/modification/enhancement is introduced, builds on it by adding ideas or makes adjustments for better implementation.</td>
            <td>
                <div class="star-rating" id="creativity_and_innovation_2"></div>
                <input type="hidden" name="creativity_and_innovation_rating_2" id="creativity_and_innovation_2">
                <span class="print-score" data-rating-id="creativity_and_innovation_2"></span>
            </td>
        </tr>
        <tr>
            <td>3. When given a problem to solve, sees it as a challenge and gets excited.</td>
            <td>
                <div class="star-rating" id="creativity_and_innovation_3"></div>
                <span class="print-score" data-rating-id="creativity_and_innovation_3"></span>
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
                </td>
            </tr>
            <tr>
                <td>2. Systematically analyzes problems and issues for effective solutions.</td>
                <td>
                    <div class="star-rating" id="critical2Stars"></div>
                    <span class="print-score" data-rating-id="critical2Stars"></span>
                </td>
            </tr>
            <tr>
                <td>3. Checks the nature and sources of data or information before deciding.</td>
                <td>
                    <div class="star-rating" id="critical3Stars"></div>
                    <span class="print-score" data-rating-id="critical3Stars"></span>
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
                </td>
            </tr>
            <tr>
                <td>2. Networks and establishes strategic alliances with stakeholders.</td>
                <td>
                    <div class="star-rating" id="environmental2Stars"></div>
                    <span class="print-score" data-rating-id="environmental2Stars"></span>
                </td>
            </tr>
            <tr>
                <td>3. Sees opportunities to effectively pursue goals.</td>
                <td>
                    <div class="star-rating" id="environmental3Stars"></div>
                    <span class="print-score" data-rating-id="environmental3Stars"></span>
                </td>
            </tr>
            <tr>
                <td>4. Attends to activities that involve relating to stakeholders.</td>
                <td>
                    <div class="star-rating" id="environmental4Stars"></div>
                    <span class="print-score" data-rating-id="environmental4Stars"></span>
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
                </td>
            </tr>
            <tr>
                <td>2. Reports to work regularly.</td>
                <td>
                    <div class="star-rating" id="honesty2Stars"></div>
                    <span class="print-score" data-rating-id="honesty2Stars"></span>
                </td>
            </tr>
            <tr>
                <td>3. Works expeditiously to achieve results on time.</td>
                <td>
                    <div class="star-rating" id="honesty3Stars"></div>
                    <span class="print-score" data-rating-id="honesty3Stars"></span>
                </td>
            </tr>
            <tr>
                <td>4. Makes use of official time and resources wisely.</td>
                <td>
                    <div class="star-rating" id="honesty4Stars"></div>
                    <span class="print-score" data-rating-id="honesty4Stars"></span>
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
                </td>
            </tr>
            <tr>
                <td>2. Sets priorities and assesses tasks effectively.</td>
                <td>
                    <div class="star-rating" id="judgement2Stars"></div>
                    <span class="print-score" data-rating-id="judgement2Stars"></span>
                </td>
            </tr>
            <tr>
                <td>3. Makes sound decisions by gathering pertinent information.</td>
                <td>
                    <div class="star-rating" id="judgement3Stars"></div>
                    <span class="print-score" data-rating-id="judgement3Stars"></span>
                </td>
            </tr>
            <tr>
                <td>4. Studies all angles of a matter and solicits ideas and information.</td>
                <td>
                    <div class="star-rating" id="judgement4Stars"></div>
                    <span class="print-score" data-rating-id="judgement4Stars"></span>
                </td>
            </tr>
            <!-- Leadership -->
        <tr>
            <th colspan="2" class="category-header">Leadership</th>
        </tr>
        <tr>
            <td>1. Knows own limitations and consults peers and subordinates.</td>
            <td>
                <div class="star-rating" id="leadership1Stars"></div>
                <span class="print-score" data-rating-id="leadership1Stars"></span>
            </td>
        </tr>
        <tr>
            <td>2. Passion for work, organization, or agency's clientele.</td>
            <td>
                <div class="star-rating" id="leadership2Stars"></div>
                <span class="print-score" data-rating-id="leadership2Stars"></span>
            </td>
        </tr>
        <tr>
            <td>3. Monitors and evaluates office performance to align with goals and objectives.</td>
            <td>
                <div class="star-rating" id="leadership3Stars"></div>
                <span class="print-score" data-rating-id="leadership3Stars"></span>
            </td>
        </tr>
        <tr>
            <td>4. Sets realistic goals and time frames.</td>
            <td>
                <div class="star-rating" id="leadership4Stars"></div>
                <span class="print-score" data-rating-id="leadership4Stars"></span>
            </td>
        </tr>
        <tr>
            <td>5. Develops subordinates and mentors for effective work performance.</td>
            <td>
                <div class="star-rating" id="leadership5Stars"></div>
                <span class="print-score" data-rating-id="leadership5Stars"></span>
            </td>
        </tr>
        <tr>
            <td>6. Performs staff functions when needed.</td>
            <td>
                <div class="star-rating" id="leadership6Stars"></div>
                <span class="print-score" data-rating-id="leadership6Stars"></span>
            </td>
        </tr>
        <tr>
            <td>7. Plans, organizes, and executes programs using a systematic process.</td>
            <td>
                <div class="star-rating" id="leadership7Stars"></div>
                <span class="print-score" data-rating-id="leadership7Stars"></span>
            </td>
        </tr>
        <tr>
            <td>8. Open to suggestions, comments, and inputs.</td>
            <td>
                <div class="star-rating" id="leadership8Stars"></div>
                <span class="print-score" data-rating-id="leadership8Stars"></span>
            </td>
        </tr>
        <tr>
            <td>9. versatile and humble enough to perform even staff functions when the need arises.</td>
            <td>
                <div class="star-rating" id="leadership9Stars"></div>
                <span class="print-score" data-rating-id="leadership9Stars"></span>
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

    <div class="total-score">
        Total Score: <span id="total">0</span> / 135
        <input type="hidden" id="total_score" name="total_score" value="">
        (<span id="percentage">0%</span>)
    </div>
    <div id="appraisal-buttons">
        <button type="submit" class="btn-primary">Submit Appraisal</button>
        <button type="button" class="btn-primary" onclick="window.print();">Print</button>
    </div>
</form>
<script>
   document.addEventListener("DOMContentLoaded", function() {
    const starRatings = document.querySelectorAll('.star-rating');
    const totalScoreElement = document.getElementById('total');
    const percentageElement = document.getElementById('percentage');
    const totalScoreInput = document.getElementById('total_score');
    const maxScore = 135; // Maximum possible score

    // Initialize star ratings
    starRatings.forEach(rating => {
        for (let i = 0; i < 5; i++) {
            const span = document.createElement('span');
            span.innerHTML = '&#9733;';
            span.addEventListener('click', function() {
                clearSelected(rating);
                this.classList.add('selected');
                let previousSibling = this.previousElementSibling;
                while (previousSibling) {
                    previousSibling.classList.add('selected');
                    previousSibling = previousSibling.previousElementSibling;
                }
                updateTotalScore();
            });
            rating.appendChild(span);
        }
    });

    function clearSelected(rating) {
        const stars = rating.querySelectorAll('span');
        stars.forEach(star => star.classList.remove('selected'));
    }

    function updateTotalScore() {
        let totalScore = 0;
        starRatings.forEach(rating => {
            const selectedStars = rating.querySelectorAll('.selected').length;
            totalScore += selectedStars;
            const ratingId = rating.getAttribute('id');
            const hiddenInput = document.querySelector(`input[name="${ratingId}"]`);
            if (hiddenInput) {
                hiddenInput.value = selectedStars; // Set hidden input value
            }
        });
        totalScoreElement.textContent = totalScore;
        totalScoreInput.value = totalScore; // Update hidden input value
        updatePercentage(totalScore);
    }

    function updatePercentage(totalScore) {
        const percentage = (totalScore / maxScore) * 100;
        percentageElement.textContent = percentage.toFixed(2) + '%';
    }

    // Update print view
    function updatePrintView() {
        const printScoreElements = document.querySelectorAll('.print-score');
        printScoreElements.forEach(element => {
            const ratingId = element.getAttribute('data-rating-id');
            const selectedStars = document.querySelectorAll(`#${ratingId} .selected`).length;
            element.textContent = selectedStars; // Display the number of stars selected in print view
        });
    }

    window.onbeforeprint = function() {
        updatePrintView();
    };
});

$(document).ready(function() {
    $('.star-rating').on('click', 'i', function() {
        var rating = $(this).index() + 1;
        $('#creativity_and_innovation_1').val(rating);

        // AJAX request to save the rating
        $.ajax({
            type: 'POST',
            url: 'peer_saved.php',
            data: {
                rating: rating
            },
            success: function(response) {
                console.log('Rating saved successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving rating:', error);
            }
        });
    });
});
</script>
</body>
</html>
