<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Frequently asked questions - BacTrack</title>
    <style>
        .faq {
            text-align: center; /* Center all content */
        }

        .faq-question {
            font-weight: bold;
            font-size: 24px;
            cursor: pointer;
            margin-bottom: 10px;
            text-align: left; /* Align questions to the left */
        }

        .faq-answer {
            display: none;
            margin-bottom: 10px;
            font-size: 18px;
            text-align: left; /* Align answers to the left */
        }
    </style>
</head>

<body>
    <h1 class="centered-paragraph">Frequently Asked Questions</h1>
    <div class="faq">
        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 1. What is BacTrack?
            </div>
            <div class="faq-answer">
                BacTrack is a healthcare project dedicated to tracking antibiotic combination therapies for improved
                healthcare outcomes.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 2. How does BacTrack work?
            </div>
            <div class="faq-answer">
                BacTrack utilizes advanced data analysis techniques to monitor and analyze the effectiveness of various
                antibiotic combinations in treating medical conditions.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 3. Who can benefit from BacTrack?
            </div>
            <div class="faq-answer">
                BacTrack can benefit healthcare professionals, researchers, and patients involved in antibiotic
                therapies and healthcare analysis.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 4. Is BacTrack compliant with privacy regulations?
            </div>
            <div class="faq-answer">
                Yes, BacTrack prioritizes data privacy and complies with all relevant healthcare data protection
                regulations.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 5. How can I get started with BacTrack?
            </div>
            <div class="faq-answer">
                To get started with BacTrack, simply sign up for an account on our website and follow the provided
                instructions to access our tracking and analysis tools.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 6. Are there any fees associated with using BacTrack?
            </div>
            <div class="faq-answer">
                Yes, we do have fees associated with using BacTrack. We charge for the services provided.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 7. Can I collaborate with other healthcare professionals on BacTrack?
            </div>
            <div class="faq-answer">
                Yes, BacTrack offers collaboration features that allow healthcare professionals to work together on
                tracking and analyzing antibiotic combination therapies.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 8. How can I contact BacTrack support?
            </div>
            <div class="faq-answer">
                For any support or inquiries, please reach out to our support team at <a href="contactus.php">Contact
                    Us</a>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 9. Is my data secure with BacTrack?
            </div>
            <div class="faq-answer">
                Yes, BacTrack employs security measures to ensure the safety and confidentiality of your data.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span class="faq-toggle"></span> 10. Can I export my tracked data from BacTrack?
            </div>
            <div class="faq-answer">
                Yes, BacTrack provides options to export your tracked data in various formats for further analysis or
                documentation.
            </div>
        </div>

    </div>

    <script>
        document.querySelectorAll('.faq-question').forEach(function (item) {
            item.addEventListener('click', function () {
                var answer = this.nextElementSibling;
                answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
            });
        });
    </script>

</body>