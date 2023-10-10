<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Frequently asked questions - BacTrack</title>
</head>

<body>
    <h1 class="centered-paragraph">Frequently Asked Questions</h1>

    <div class="faq">

        <div class="question-answer">
            <h3>1. What is BacTrack?</h3>
            <p>BacTrack is a healthcare project dedicated to tracking antibiotic combination therapies for improved
                healthcare outcomes.
            </p>
        </div>

        <div class="question-answer">
            <h3>2. How does BacTrack work?</h3>
            <p>BacTrack utilizes advanced data analysis techniques to monitor and analyze the effectiveness of various
                antibiotic combinations in treating medical conditions.
            </p>
        </div>

        <div class="question-answer">
            <h3>3. Who can benefit from BacTrack?</h3>
            <p>BacTrack can benefit healthcare professionals, researchers, and patients involved in antibiotic
                therapies and healthcare analysis.
            </p>
        </div>

        <div class="question-answer">
            <h3>4. Is BacTrack compliant with privacy regulations?</h3>
            <p>Yes, BacTrack prioritizes data privacy and complies with all relevant healthcare data protection
                regulations.
            </p>
        </div>

        <div class="question-answer">
            <h3>5. How can I get started with BacTrack?</h3>
            <p>To get started with BacTrack, simply sign up for an account on our website and follow the provided
                instructions to access our tracking and analysis tools.
            </p>
        </div>

        <div class="question-answer">
            <h3>6. Are there any fees associated with using BacTrack?</h3>
            <p>
                Yes, we do have fees associated with using BacTrack. We charge for the services provided.
            </p>
        </div>

        <div class="question-answer">
            <h3>7. Can I collaborate with other healthcare professionals on BacTrack?</h3>
            <p>Yes, BacTrack offers collaboration features that allow healthcare professionals to work together on
                tracking and analyzing antibiotic combination therapies.
            </p>
        </div>

        <div class="question-answer">
            <h3>8. How can I contact BacTrack support?</h3>
            <p>For any support or inquiries, please reach out to our support team at <a href="contactus.php">Contact Us</a></p>
        </div>

        <div class="question-answer">
            <h3>9. Is my data secure with BacTrack?</h3>
            <p>
                Yes, BacTrack employs security measures to ensure the safety and confidentiality of your data.
            </p>
        </div>

        <div class="question-answer" class="spacer">
            <h3>10. Can I export my tracked data from BacTrack?</h3>
            <p>Yes, BacTrack provides options to export your tracked data in various formats for further analysis or
                documentation.
            </p>
        </div>

    </div>

    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>


</body>