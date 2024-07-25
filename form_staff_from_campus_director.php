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
        input[type="date"] {
            width: 15%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius:  5px;
            box-sizing: border-box;
        } 
        textarea {
            width: 50%;
            height: 100px; /* Adjust height as needed */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"] {
            width: 30%;
            padding: 8px;
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
        h1 {
            color: #2E8B57;
            text-align: center;
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
        .navbar {
            display: none;
        }
        .number-rating {
            display: none;
        }
        @media print {
            .star-rating {
                display: none;
            }
            .number-rating {
                display: block;
            }
        }
    </style>
</head>
<body>

 <h2 style="text-align:center">Performance Appraisal for Staff <br>(From Human Resource Management Office) </h2>
<br>
<form method="post" action="save_appraisal.php" id="hr_form">
    <input type="hidden" name="form_type" value="campus_director">
    <div class="mb-3">
        <label for="employee">Name:</label>
        <input type="text" name="employee" id="employee" required>
        <span id="" class="error-message"></span>
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required>
        <span id="" class="error-message"></span>
    </div>

    <div class="mb-3">
        <label for="assignment">Place of Assignment:</label>
        <input type="text" name="assignment" id="assignment" required>
        <span id="" class="error-message"></span>
        <label for="contract">Contract Period:</label>
        <input type="date" name="contract" id="contract" required>
        <label for="contract">End Period:</label>
        <input type="date" name="contract" id="contract" required>
        <span id="" class="error-message"></span>
    </div>
    
    <p style="line-height: 100%; margin-right: -0.32in; margin-bottom: 0.14in">
        <font face="Cambria, serif">Kindly provide evaluation for your staff based on their skill and trait factors.</font></p>
    <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><font face="Cambria, serif"><font size="2" style="font-size: 10pt"><b>Legend: </b></font></font><font face="Cambria, serif"><font size="2" style="font-size: 10pt">Q – Quality, E – Efficiency, T – Timeliness, A – Average, –</font></font></p>
    <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><br/>
        <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><font face="Cambria, serif"><font size="2" style="font-size: 10pt"><b>Numerical & Adjectival Rating: </b></font></font><font face="Cambria, serif"><font size="2" style="font-size: 10pt">5 – Outstanding, 4 – Very Satisfactory, 3 – Satisfactory, 2 – Unsatisfactory, 1 – Poor</font></font></p>
    <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><br/></p>

    <table>
        <tr>
            <th>Evaluation Factors</th>
            <th></th>
            <th>Q</th>
            <th>T</th>
            <th>E</th>
            <th>A</th>
        </tr>
        <!-- Creativity and Innovation -->
        <tr>
            <th colspan="2" class="category-header">Performance Skill Factors</th>
        </tr>
        <tr>
            <td>Work Performance</td>
            <td>Recommends and implements reforms contributing to the attainment of the office goals and objectives.</td>
            <td><div class="star-rating" id="q" data-category="q"></div><div class="number-rating" id="q_num"></div></td>
            <td><div class="star-rating" id="t" data-category="t"></div><div class="number-rating" id="t_num"></div></td>
            <td><div class="star-rating" id="e" data-category="e"></div><div class="number-rating" id="e_num"></div></td>
            <td><div class="star-rating" id="avg" data-category="avg"></div><div class="number-rating" id="avg_num"></div></td>
        </tr>
        <tr>
            <td>Cooperation & Teamwork</td>
            <td>Integrates own activities with fellow employees, readily offers and accepts assistance to accomplish tasks and demonstrates cooperativeness</td>
            <td><div class="star-rating" id="q1" data-category="q"></div><div class="number-rating" id="q1_num"></div></td>
            <td><div class="star-rating" id="t1" data-category="t"></div><div class="number-rating" id="t1_num"></div></td>
            <td><div class="star-rating" id="e1" data-category="e"></div><div class="number-rating" id="e1_num"></div></td>
            <td><div class="star-rating" id="avg1" data-category="avg"></div><div class="number-rating" id="avg1_num"></div></td>
        </tr>
        <tr>
            <td>Communication</td>
            <td>Communicates effectively (written, oral, presentation) with clients, business customers & staff members</td>
            <td><div class="star-rating" id="q2" data-category="q"></div><div class="number-rating" id="q2_num"></div></td>
            <td><div class="star-rating" id="t2" data-category="t"></div><div class="number-rating" id="t2_num"></div></td>
            <td><div class="star-rating" id="e2" data-category="e"></div><div class="number-rating" id="e2_num"></div></td>
            <td><div class="star-rating" id="avg2" data-category="avg"></div><div class="number-rating" id="avg2_num"></div></td>
        </tr>

        <tr>
            <th colspan="2" class="category-header">Performance Traits Factors</th>
        </tr>
        <tr>
            <td>Dependability (Attendance & Commitment)</td>
            <td>Reports to work on time</td>
            <td><div class="star-rating" id="q3" data-category="q"></div><div class="number-rating" id="q3_num"></div></td>
            <td><div class="star-rating" id="t3" data-category="t"></div><div class="number-rating" id="t3_num"></div></td>
            <td><div class="star-rating" id="e3" data-category="e"></div><div class="number-rating" id="e3_num"></div></td>
            <td><div class="star-rating" id="avg3" data-category="avg"></div><div class="number-rating" id="avg3_num"></div></td>
        </tr>
        <tr>
            <td></td>
            <td>Uses time constructively productively</td>
            <td><div class="star-rating" id="q4" data-category="q"></div><div class="number-rating" id="q4_num"></div></td>
            <td><div class="star-rating" id="t4" data-category="t"></div><div class="number-rating" id="t4_num"></div></td>
            <td><div class="star-rating" id="e4" data-category="e"></div><div class="number-rating" id="e4_num"></div></td>
            <td><div class="star-rating" id="avg4" data-category="avg"></div><div class="number-rating" id="avg4_num"></div></td>
        </tr>
        <tr>
            <td>Leadership</td>
            <td>Demonstrates the ability to direct, control and guide individuals or teams towards achieving a common goal</td>
            <td><div class="star-rating" id="q5" data-category="q"></div><div class="number-rating" id="q5_num"></div></td>
            <td><div class="star-rating" id="t5" data-category="t"></div><div class="number-rating" id="t5_num"></div></td>
            <td><div class="star-rating" id="e5" data-category="e"></div><div class="number-rating" id="e5_num"></div></td>
            <td><div class="star-rating" id="avg5" data-category="avg"></div><div class="number-rating" id="avg5_num"></div></td>
        </tr>
        <tr>
            <td>Professional Presentation</td>
            <td>Demonstrates a high level of professionalism like mutual trust & support for fellow employer, integrity & dedication to the organization</td>
            <td><div class="star-rating" id="q6" data-category="q"></div><div class="number-rating" id="q6_num"></div></td>
            <td><div class="star-rating" id="t6" data-category="t"></div><div class="number-rating" id="t6_num"></div></td>
            <td><div class="star-rating" id="e6" data-category="e"></div><div class="number-rating" id="e6_num"></div></td>
            <td><div class="star-rating" id="avg6" data-category="avg"></div><div class="number-rating" id="avg6_num"></div></td>
        </tr>
    </table>
    <div class="total-score">
        Total Score: <span id="total">0</span> / 35
        <input type="hidden" id="total_score" name="total_score" value="">
        <span id="total-percentage"></span>
    </div>
    <div style="margin-bottom: 0.14in">
        <label for="comments"><b>Comments for Development Purposes:</b></label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br>
    </div>
    <label for="recommendation"><b>Recommendation:</b></label>
    <br>
    <input type="checkbox" id="renewal" name="recommendation" value="Renewal">
    <label for="renewal">For renewal</label>
    <input type="checkbox" id="non_renewal" name="recommendation" value="Non-Renewal">
    <label for="non_renewal">Non-renewal</label>
    <br>
    <label for="assessed_by">Assessed by:</label>
    <input type="text" id="assessed_by" name="assessed_by" style="width: 60%;">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date">
    <p style="line-height: 100%; margin-left: 2.5in; margin-bottom: 0in">
        <font face="Cambria, serif">HRMO</font>
    </p>
    <br>
    <button type="submit" id="submitAppraisal">Submit Appraisal</button>
    <button type="button" id="printButton" onclick="hideButtons()">Print</button>
</form>

<script>
    function calculateTotal() {
        let total = 0;
        const maxScore = 35; // Total score out of
        const starRatings = document.querySelectorAll('.star-rating[data-category="avg"]');
        starRatings.forEach(rating => {
            total += parseInt(rating.getAttribute('data-stars')) || 0;
        });

        document.getElementById("total").textContent = total;
        document.getElementById("total_score").value = total;
    }
    function updateStars(starRating, stars) {
        starRating.innerHTML = '';
        const maxStars = 5;
        for (let i = 1; i <= maxStars; i++) {
            const star = document.createElement('span');
            star.innerHTML = '★';
            if (i <= stars) {
                star.classList.add('selected');
            }
            star.setAttribute('data-stars', i);
            starRating.appendChild(star);
        }
        starRating.setAttribute('data-stars', stars);

        // Update number rating
        const numberRating = starRating.nextElementSibling;
        numberRating.innerHTML = stars;
    }

    function calculateAverage(row) {
        const qStars = parseInt(row.querySelector('.star-rating[data-category="q"]').getAttribute('data-stars')) || 0;
        const tStars = parseInt(row.querySelector('.star-rating[data-category="t"]').getAttribute('data-stars')) || 0;
        const eStars = parseInt(row.querySelector('.star-rating[data-category="e"]').getAttribute('data-stars')) || 0;
        const avgStars = Math.round((qStars + tStars + eStars) / 3);

        const avgRating = row.querySelector('.star-rating[data-category="avg"]');
        updateStars(avgRating, avgStars);

        const percentage = Math.round((avgStars / 5) * 100);
        const percentageDisplay = row.querySelector('.percentage');
        if (percentageDisplay) {
            percentageDisplay.textContent = ' (' + percentage + '%)';
        }
    }

    function calculateTotalScore() {
        let totalScore = 0;
        const avgRows = document.querySelectorAll('.star-rating[data-category="avg"]');
        avgRows.forEach(avgRow => {
            totalScore += parseInt(avgRow.getAttribute('data-stars')) || 0;
        });

        document.getElementById('total_score').value = totalScore;

        const totalScoreDisplay = document.getElementById('total');
        totalScoreDisplay.textContent = totalScore;

        const totalPercentage = Math.round((totalScore / (avgRows.length * 5)) * 100);
        const totalPercentageDisplay = document.getElementById('total-percentage');
        if (totalPercentageDisplay) {
            totalPercentageDisplay.textContent = ' (' + totalPercentage + '%)';
        }

        updateRecommendation(totalPercentage);
    }

    function updateRecommendation(totalPercentage) {
        const renewalCheckbox = document.getElementById('renewal');
        const nonRenewalCheckbox = document.getElementById('non_renewal');

        if (totalPercentage >= 80) {
            renewalCheckbox.checked = true;
            nonRenewalCheckbox.checked = false;
        } else {
            renewalCheckbox.checked = false;
            nonRenewalCheckbox.checked = true;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const starRows = document.querySelectorAll('tr:not(.category-header)');

        starRows.forEach(row => {
            const starRatings = row.querySelectorAll('.star-rating');

            starRatings.forEach(starRating => {
                updateStars(starRating, 0);

                starRating.addEventListener('click', function(event) {
                    const selectedStars = parseInt(event.target.getAttribute('data-stars'));
                    updateStars(starRating, selectedStars);
                    calculateAverage(row);
                    calculateTotalScore();
                });
            });
        });

        calculateTotalScore();
    });

    document.getElementById('hr_form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('save_appraisal.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'appraisal_form.pdf';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => console.error('Error:', error));
    });

    function hideButtons() {
        document.getElementById('submitAppraisal').style.display = 'none';
        document.getElementById('printButton').style.display = 'none';
        window.print();
        document.getElementById('submitAppraisal').style.display = 'block';
        document.getElementById('printButton').style.display = 'block';
    }
</script>
</body>
</html>

