<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Contact Information - BacTrack</title>
</head>

<body>
    <?php require_once "../nav_bar.php"; ?> 
    <h1>Connect With Us</h1>
    <p class="centered-paragraph">Contact us at BacTrack for expert guidance on antibiotic combination therapies and improved healthcare outcomes</p>


    <form action="send_contact_email.php" method="POST" target="_blank">
        <label for="name">Full name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required autocomplete="name"><br><br>

        <label for="email">Email ID</label>
        <input type="email" id="email" name="email" placeholder="firstname@gmail.com" required autocomplete="email"><br><br>

        <label for="description">How may we help you?</label><br>
        <textarea id="description" name="description" rows="4" cols="50" placeholder="A detailed description" required autocomplete="description"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <div class="contact-info">
        <h2>General Contact Information</h2>
        <p>Company Name: BacTrack</p>
        <p>Physical Address: Lägerhyddsvägen 1, 752 37 Uppsala</p>
    </div>

    <div class="email-IDS">
        <h2>Email Addresses</h2>
        <ul>
            <li>General Contact Email: <a href="mailto:bactrack2023@gmail.com">bactrack2023@gmail.com</a></li>
        </ul>
    </div>

    <div class="social-media-links">
        <h2>Social media links</h2>
        <p><a href="https://www.linkedin.com/company/bactrack" target="_blank">LinkedIn</a></p>
        <p><a href="https://twitter.com/bactrack" target="_blank">Twitter</a></p>
        <p><a href="https://www.facebook.com/bactrack" target="_blank">Facebook</a></p>
    </div>

    <div class="Location">
        <h2>Our Location</h2>
        <p>Physical Address: Lägerhyddsvägen 1, 752 37 Uppsala</p>
        <a href="https://maps.app.goo.gl/u6PB1xFwVHq3BgyBA" target="_blank">View on Google Maps</a>
    </div>

    <div class="open-hours">
        <h2>Business Hours</h2>
        <p><b>Mon-Fri:</b> 9:00 AM - 6:00 PM</p>
        <p><b>Sat-Sun:</b> Closed</p>
    </div>

    <div class="Privacy-policy">
        <h2>Privacy Policy</h2>
        <select id="policy-dropdown" onchange="showPolicy()">
            <option value="0">Select a section</option>
            <option value="1">Information We Collect</option>
            <option value="2">How We Use Your Information</option>
            <option value="3">Information Sharing</option>
            <option value="4">Your Choices and Rights</option>
            <option value="5">Security Measures</option>
            <option value="6">Changes to this Policy</option>
            <option value="7">Contact Us</option>
        </select>
    </div>

    <div id="policy-content-1" class="policy-content">
        <h2>1. Information We Collect</h2>
        <p>
            <h3>Personal Information</h3>
        </p>
        <p> Name: To provide personalized services and user identification.</p>
        <p> Contact Information: Such as email address for communication purposes.</p>
    </div>

    <div id="policy-content-2" class="policy-content">
        <h2>2. How do we collect your data</h2>
        <p><b>We use the information we collect for the following purposes:</b></p>
        <p> Providing Services: To track and analyze antibiotic combination therapies for better healthcare outcomes.</p>
        <p> Communication: To send relevant updates, notifications, and respond to inquiries.</p>
        <p> Research and Analysis: Aggregated and anonymized data may be used for research and analysis to improve our services.</p>
        <p> Compliance: To comply with legal obligations and industry regulations.</p>
    </div>

    <div id="policy-content-3" class="policy-content">
        <h2>3. How do we Use Your Information</h2>
        <p><b>We use the information we collect for the following purposes:</b></p>
        <p> Providing Services: To track and analyze antibiotic combination therapies for better healthcare outcomes.</p>
        <p> Communication: To send relevant updates, notifications, and respond to inquiries.</p>
    </div>

    <div id="policy-content-4" class="policy-content">
        <h2>4. How do we store your data</h2>
        <p>Our company securely stores your data on a local computer, and the responsibility for managing this data rests with our designated administrator.</p>
        <p>Our company will keep your data for[time period]. Once the time period has expired, we will delete your data by [how we delete]</p>
        
    </div>

    <div id="policy-content-5" class="policy-content">
        <h2>5. Your Choices and Rights</h2>
        <p><b>You have the right to:</b></p>
        <p> Access, Correct, or Delete Your Information: You can request access, correction, or deletion of your personal information by contacting us.</p>
        <p> Opt-Out of Communications: You can opt-out of receiving promotional communications from us at any time.</p>
        <p> The right to rectification: You have the right to request that Our Company amend any information you believe to be inaccurate. Additionally, you have the right to request Our Company to supplement any information you believe to be incomplete.</p>
        <p> The right to restrict processing: You have the right, under specific conditions, to request that Our Company limit the processing of your personal data.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>6. Cookies</h2>
        
        <p><b>6.1. How do we use cookies</b></p>
        <p>Our Company utilizes cookies for various purposes to enhance your website experience, such as:</p>
        <li>Maintaining your signed-in status</li>

        <p><b>6.2. What type of cookies do we use</b></p>
        <p>Session cookies: At BacTrack, we use session cookies to enhance your browsing experience. These cookies are temporary and are stored on your device only for the duration of your current session. Once you close your browser, they are automatically deleted.</p>
    
        <h2><b>6.3. How to manage cookies</b></h2>
        <p>You have the option to configure your browser to decline cookies, and the aforementioned website provides instructions on how to delete them from your browser. It's important to note that in a few instances, disabling cookies may impact the functionality of certain features on our website.</p>
    </div>

    <div id="policy-content-7" class="policy-content">
        <h2>7. Changes to this policy</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us at: <a href="mailto:bactrack2023@gmail.com">bactrack2023@gmail.com</a></p>

    </div>


    <h1 class="centered-paragraph">Frequently Asked Questions</h1>

    <div class="faq">
        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>1. What is BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>BacTrack is a healthcare project dedicated to tracking antibiotic combination therapies for improved
                    healthcare outcomes.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>2. How does BacTrack work?</span>
            </button>
            <div class="dropdown-content">
                <p>BacTrack utilizes advanced data analysis techniques to monitor and analyze the effectiveness of
                    various
                    antibiotic combinations in treating medical conditions.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>3. Who can benefit from BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>BacTrack can benefit healthcare professionals, researchers, and institutions involved in antibiotic
                    therapies and healthcare analysis.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>4. Is BacTrack compliant with privacy regulations?</span>
            </button>
            <div class="dropdown-content">
                <p>Yes, BacTrack prioritizes data privacy and complies with all relevant healthcare data protection
                    regulations.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>5. How can I get started with BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    To get started with BacTrack, simply sign up for an account on our website and follow the provided
                    instructions to access our tracking and analysis tools.

                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>6. Are there any fees associated with using BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    Basic usage of BacTrack is available for free. However, premium features and advanced analytics may
                    require a subscription.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>7. Can I collaborate with other healthcare professionals on BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    Yes, BacTrack offers collaboration features that allow healthcare professionals to work together on
                    tracking and analyzing antibiotic combination therapies.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>8. How can I contact BacTrack support?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    For any support or inquiries, please reach out to our support team at <a href="mailto:bactrack2023@gmail.com">bactrack2023@gmail.com.</a>.
                </p>
            </div>
        </div>

        <div class="question-answer">
            <button class="dropdown-toggle">
                <span>9. Is my data secure with BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    Yes, BacTrack employs industry-standard security measures to ensure the safety and confidentiality
                    of your data.
                </p>
            </div>
        </div>

        <div class="question-answer" class="spacer">
            <button class="dropdown-toggle">
                <span>10. Can I export my tracked data from BacTrack?</span>
            </button>
            <div class="dropdown-content">
                <p>
                    Yes, BacTrack provides options to export your tracked data in various formats for further analysis
                    or documentation.
                </p>
            </div>
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


    <script>
        function showPolicy() {
            var selectedSection = document.getElementById("policy-dropdown").value;
            var allSections = document.getElementsByClassName("policy-content");
            for (var i = 0; i < allSections.length; i++) {
                allSections[i].style.display = "none";
            }
            document.getElementById("policy-content-" + selectedSection).style.display = "block";
        }
    </script>

</body>