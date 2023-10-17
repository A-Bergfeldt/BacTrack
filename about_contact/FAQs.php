<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="contactus.css">
    <title>Frequently asked questions - BacTrack</title>
</head>

<body>
    <?php require_once "../nav_bar.php"; ?>
    </br></br></br></br>
    <h1 class="centered-paragraph">Frequently Asked Questions</h1>

    <div class="faq">

        <div class="question-answer">
            <h4>1. What is BacTrack?</h4>
            <p>BacTrack is a healthcare project dedicated to tracking antibiotic combination therapies for improved
                healthcare outcomes.
            </p>
        </div>

        <div class="question-answer">
            <h4>2. How does BacTrack work?</h4>
            <p>BacTrack utilizes advanced data analysis techniques to monitor and analyze the effectiveness of various
                antibiotic combinations in treating medical conditions.
            </p>
        </div>

        <div class="question-answer">
            <h4>3. Who can benefit from BacTrack?</h4>
            <p>BacTrack can benefit healthcare professionals, researchers, and patients involved in antibiotic
                therapies and healthcare analysis.
            </p>
        </div>

        <div class="question-answer">
            <h4>4. Is BacTrack compliant with privacy regulations?</h4>
            <p>Yes, BacTrack prioritizes data privacy and complies with all relevant healthcare data protection
                regulations.
            </p>
        </div>

        <div class="question-answer">
            <h4>5. How can I get started with BacTrack?</h4>
            <p>To get started with BacTrack, simply sign up for an account on our website and follow the provided
                instructions to access our tracking and analysis tools.
            </p>
        </div>

        <div class="question-answer">
            <h4>6. Are there any fees associated with using BacTrack?</h4>
            <p>
                Yes, we do have fees associated with using BacTrack. We charge for the services provided.
            </p>
        </div>

        <div class="question-answer">
            <h4>7. Can I collaborate with other healthcare professionals on BacTrack?</h4>
            <p>Yes, BacTrack offers collaboration features that allow healthcare professionals to work together on
                tracking and analyzing antibiotic combination therapies.
            </p>
        </div>

        <div class="question-answer">
            <h4>8. How can I contact BacTrack support?</h4>
            <p>For any support or inquiries, please reach out to our support team at <a href="contactus.php">Contact
                    Us</a></p>
        </div>

        <div class="question-answer">
            <h4>9. Is my data secure with BacTrack?</h4>
            <p>
                Yes, BacTrack employs security measures to ensure the safety and confidentiality of your data.
            </p>
        </div>

        <div class="question-answer" class="spacer">
            <h4>10. Can I export my tracked data from BacTrack?</h4>
            <p>Yes, BacTrack provides options to export your tracked data in various formats for further analysis or
                documentation.
            </p>
        </div>

    </div>
    </br></br></br></br></br></br>
    <?php require_once "../footer/footer.php"; ?>
    <script>
        document.querySelectorAll('.question-answer').forEach(item => {
            const question = item.querySelector('h4');
            const answer = item.querySelector('p');
            const span = document.createElement('span');
            span.textContent = '+';
            question.appendChild(span);

            question.addEventListener('click', () => {
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    span.textContent = '+';
                } else {
                    answer.style.display = 'block';
                    span.textContent = '-';
                }
            });
        });
    </script>



</body>