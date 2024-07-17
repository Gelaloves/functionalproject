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
    </style>
</head>
<body>

 <h2>Performance Appraisal for Staff </h2>
 <h2>(From Human Resource Management Office)</h2>

<br>
<br>
<br>
    <form method="post" action="save_appraisal.php" id="supervisor_form">
        <input type="hidden" name="form_type" value="supervisor">
       <div class="mb-3">
        <div class="mb-3">
            <label for="employee">Name:</label>
            <input type="text" name="employee" id="employee" required >
            <span id="" class="error-message"></span>
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" required >
            <span id="" class="error-message"></span>
        </div>
    
        <div class="mb-3">
            <label for="assignment">Place of Assignment:</label>
            <input name="assignment" id="assignment" required>
            <span id="" class="error-message"></span></input>
            <label for="contract">Contract Period:</label>
            <input type="date" name="contract" id="contract" required>
            <label for="contract">End Period:</label>
            <input type="date" name="contract" id="contract" required>
            <span id="" class="error-message"></span>
        </div>
        
<p style="line-height: 100%; margin-right: -0.32in; margin-bottom: 0.14in">
  <font face="Cambria, serif">Kindly provide evaluation for your staff
  based on their skill and trait factors.</font></p>
  <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><font face="Cambria, serif"><font size="2" style="font-size: 10pt"><b>Legend: </b></font></font><font face="Cambria, serif"><font size="2" style="font-size: 10pt">Q
&ndash; Quality, E &ndash; Efficiency, T &ndash;
Timeliness, A &ndash; Average, &ndash;</font></font></p>
<p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><br/>
  <p lang="en-US" style="line-height: 100%; margin-bottom: 0in"><font face="Cambria, serif"><font size="2" style="font-size: 10pt"><b>Numerical
&amp; Adjectival Rating: </b></font></font><font face="Cambria, serif"><font size="2" style="font-size: 10pt">5
&ndash; Outstanding, 4 &ndash; Very Satisfactory, 3 &ndash;
Satisfactory, 2 &ndash; Unsatisfactory, 1 &ndash; Poor</font></font></p>
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
                <td><div class="star-rating" id="q" data-category="q"></div></td>
                <td><div class="star-rating" id="t" data-category="t"></div></td>
                <td><div class="star-rating" id="e" data-category="e"></div></td>
                <td><div class="star-rating" id="avg" data-category="avg"></div></td>
            </tr>
            <tr>
                <td>Cooperation & Teamwork</td>
                <td>Integrates own activities with fellow employees, readily offers and accepts assistance to accomplish tasks and demonstrates cooperativeness</td>
                <td><div class="star-rating" id="q1" data-category="q"></div></td>
                <td><div class="star-rating" id="t1" data-category="t"></div></td>
                <td><div class="star-rating" id="e1" data-category="e"></div></td>
                <td><div class="star-rating" id="avg1" data-category="avg"></div></td>
            </tr>
            <tr>
                <td>Communication</td>
                <td>Communicates effectively (written, oral, presentation) with clients, business customers & staff members</td>
                <td><div class="star-rating" id="q2" data-category="q"></div></td>
                <td><div class="star-rating" id="t2" data-category="t"></div></td>
                <td><div class="star-rating" id="e2" data-category="e"></div></td>
                <td><div class="star-rating" id="avg2" data-category="avg"></div></td>
            </tr>

            <tr>
                <th colspan="2" class="category-header">Performance Traits Factors</th>
            </tr>
            <tr>
                <td>Dependability (Attendance & Commitment)</td>
                <td>Reports to work on time</td>
                <td><div class="star-rating" id="q3" data-category="q"></div></td>
                <td><div class="star-rating" id="t3" data-category="t"></div></td>
                <td><div class="star-rating" id="e3" data-category="e"></div></td>
                <td><div class="star-rating" id="avg3" data-category="avg"></div></td>
            </tr>
            <tr>
                <td></td>
                <td>Uses time constructively productively</td>
                <td><div class="star-rating" id="q4" data-category="q"></div></td>
                <td><div class="star-rating" id="t4" data-category="t"></div></td>
                <td><div class="star-rating" id="e4" data-category="e"></div></td>
                <td><div class="star-rating" id="avg4" data-category="avg"></div></td>
            </tr>
            <tr>
                <td>Initiative</td>
                <td>Anticipates required tasks & acts accordingly; demonstrates willingness & ability to take risks; makes creative uses of available resources to deliver assigned tasks</td>
                <td><div class="star-rating" id="q5" data-category="q"></div></td>
                <td><div class="star-rating" id="t5" data-category="t"></div></td>
                <td><div class="star-rating" id="e5" data-category="e"></div></td>
                <td><div class="star-rating" id="avg5" data-category="avg"></div></td>
            </tr>
            <tr>
                <td>Professional Presentation</td>
                <td>Demonstrates a high level of professionalism like mutual trust & support for fellow employer, integrity & dedication to the organization</td>
                <td><div class="star-rating" id="q6" data-category="q"></div></td>
                <td><div class="star-rating" id="t6" data-category="t"></div></td>
                <td><div class="star-rating" id="e6" data-category="e"></div></td>
                <td><div class="star-rating" id="avg6" data-category="avg"></div></td>
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

        <br><br>
             <label for="comments"><b>Recommendation:</b></label>
             <br><br>
            <input type="checkbox" id="renewal" name="recommendation" value="Renewal">
            <label for="renewal">For renewal</label>
            <input type="checkbox" id="non_renewal" name="recommendation" value="Non-Renewal">
            <label for="non_renewal">Non-renewal</label>
            <br><br>
            <label for="assessed-by">Assessed by:</label>
            <input type="text" id="assessed_by" name="assessed_by" style="width: 60%;">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
        <p style="line-height: 100%; margin-left: 2.5in; margin-bottom: 0in">
            <font face="Cambria, serif">HRMO</font>
        </p>
        <br>
            <button type="submit">Submit Appraisal</button>
            <button type="button" onclick="window.print();">Print</button>
    </form>


<script>
    function calculateTotal() {
        let total = 0;
        // Calculate total score based on selected star ratings
        total += getStarRatingValue("creativity1");
        total += getStarRatingValue("creativity2");
        total += getStarRatingValue("creativity3");
        total += getStarRatingValue("critical1");
        total += getStarRatingValue("critical2");
        total += getStarRatingValue("critical3");
        total += getStarRatingValue("environmental1");
        total += getStarRatingValue("environmental2");
        total += getStarRatingValue("environmental3");
        total += getStarRatingValue("environmental4");
        total += getStarRatingValue("honesty1");
        total += getStarRatingValue("honesty2");
        total += getStarRatingValue("honesty3");
        total += getStarRatingValue("honesty4");
        total += getStarRatingValue("judgement1");
        total += getStarRatingValue("judgement2");
        total += getStarRatingValue("judgement3");
        total += getStarRatingValue("judgement4");
        total += getStarRatingValue("leadership1");
        total += getStarRatingValue("leadership2");
        total += getStarRatingValue("leadership3");
        total += getStarRatingValue("leadership4");
        total += getStarRatingValue("leadership5");
        total += getStarRatingValue("leadership6");
        total += getStarRatingValue("leadership7");
        total += getStarRatingValue("leadership8");

        // Update total score
        document.getElementById("total").textContent = total;
    }

    function getStarRatingValue(id) {
        const stars = document.getElementById(id + "Stars").querySelectorAll(".star-rating span");
        let rating = 0;
        stars.forEach(star => {
            if (star.classList.contains("selected")) {
                rating += 1;
            }
        });
        return rating;
    }


document.addEventListener('DOMContentLoaded', function() {
    const starRows = document.querySelectorAll('tr:not(.category-header)'); // Select all table rows except header rows

    starRows.forEach(row => {
        const starRatings = row.querySelectorAll('.star-rating');

        starRatings.forEach(starRating => {
            updateStars(starRating, 0); // Initialize star ratings

            starRating.addEventListener('click', function(event) {
                const selectedStars = parseInt(event.target.getAttribute('data-stars'));
                updateStars(starRating, selectedStars);
                calculateAverage(row); // Recalculate average when stars are updated
                calculateTotalScore(); // Recalculate total score after each star update
            });
        });
    });

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
    }

    function calculateAverage(row) {
        const qStars = parseInt(row.querySelector('.star-rating[data-category="q"]').getAttribute('data-stars')) || 0;
        const tStars = parseInt(row.querySelector('.star-rating[data-category="t"]').getAttribute('data-stars')) || 0;
        const eStars = parseInt(row.querySelector('.star-rating[data-category="e"]').getAttribute('data-stars')) || 0;
        const avgStars = Math.round((qStars + tStars + eStars) / 3);

        const avgRating = row.querySelector('.star-rating[data-category="avg"]');
        updateStars(avgRating, avgStars);

        // Update percentage display
        const percentage = Math.round((avgStars / 5) * 100); // Calculate percentage based on a scale of 5 stars
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

        // Update total percentage display
        const totalPercentage = Math.round((totalScore / (avgRows.length * 5)) * 100); // Calculate percentage out of possible total
        const totalPercentageDisplay = document.getElementById('total-percentage');
        if (totalPercentageDisplay) {
            totalPercentageDisplay.textContent = ' (' + totalPercentage + '%)';
        }

        // Automatically update recommendation based on total percentage
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

    // Initial calculation when the page loads
    calculateTotalScore();
});

</script>
</body>
</html>

