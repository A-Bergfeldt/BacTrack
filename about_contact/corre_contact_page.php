<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mina testing home page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="corinne_style_sheet.css">
    </head>

<body>
    <nav>
        <!--<div class="logo">Logo here</div>-->
        <a href="corre_home_page.php">
        <img src="logo_main.png" alt="Logo" width="95" height="65">
        </a>
        <ul>
        <li><a href ="corre_home_page.php">Home</a></li>
            <li><a href ="about_page.php">About</a></li>
            <li><a href ="contact_page.php">Contact</a></li>
            <li><a href ="corre_statistics_page.php">Statistics</a></li>
            <li><a href ="login.php">Login</a></li>
        </ul>
    </nav>


<body>
    <h1>Connect With Us</h1>
    <p>"Contact us at BacTrack for expert guidance on antibiotic combination therapies and improved healthcare outcomes."</p>
    <form action="submit_form.php" method="POST" target="_blank">
        <label for="name">Full name:</label>
        <input type="text" id="name" name="name" required autocomplete="name"><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required autocomplete="address"><br><br>

        <label for="description">How may we help you?</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required autocomplete="description"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <div class="contact-info">
        <h2>General Contact Information</h2>
        <p>Company Name: BacTrack</p>
        <p>Physical Address: 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA</p>
    </div>

    <div class="contact-info">
        <h2>Phone Numbers</h2>
        <ul>
            <li>Main Phone Number: +1 (555) 123-4567</li>
            <li>Emergency Contact Number: +1 (555) 789-0123</li>
        </ul>
    </div>

    <div class="contact-info">
        <h2>Email Addresses</h2>
        <ul>
            <li>General Contact Email: info@bactrack.com</li>
            <li>Support Email: support@bactrack.com</li>
            <li>Sales/Inquiries Email: sales@bactrack.com</li>
            <li>Technical Support Email: techsupport@bactrack.com</li>
        </ul>
    </div>

    <div class="contact-info">
        <h2>Fax Number</h2>
        <p>Fax Number: +1 (555) 987-6543</p>
    </div>

    <div class="contact-info">
        <h2>Social media links</h2>
        <p><a href="https://www.linkedin.com/company/bactrack" target="_blank">LinkedIn</a></p>
        <p><a href="https://twitter.com/bactrack" target="_blank">Twitter</a></p>
        <p><a href="https://www.facebook.com/bactrack" target="_blank">Facebook</a></p>
    </div>

    <div class="contact-info">
        <h2>Our Location</h2>
        <p>Physical Address: 123 Medical Drive, Cityville, Stateville, 12345</p>
        <a href="https://www.google.com/maps?q=123+Medical+Drive,Cityville,Stateville,12345" target="_blank">View on Google Maps</a>
    </div>

    <div class="contact-info">
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
            <h3>1.1. Personal Information</h3>
        </p>
        <p> Name: To provide personalized services and user identification.</p>
        <p> Contact Information: Such as email address and phone number for communication purposes.</p>
        <p> Health Information: Including details about antibiotic therapies, medical conditions, and related data for tracking and analysis</p>
        <p>
            <h3>1.2. Non-Personal Information</h3>
        </p>
        <p> Usage Data: Information about your interactions with our services, such as pages visited, features used, and duration of use.</p>
        <p> Device Information: Including but not limited to device type, operating system, and browser used.</p>
    </div>

    <div id="policy-content-2" class="policy-content">
        <h2>2. How We Use Your Information</h2>
        <p><b>We use the information we collect for the following purposes:</b></p>
        <p> Providing Services: To track and analyze antibiotic combination therapies for better healthcare outcomes.</p>
        <p> Communication: To send relevant updates, notifications, and respond to inquiries.</p>
        <p> Research and Analysis: Aggregated and anonymized data may be used for research and analysis to improve our services.</p>
        <p> Compliance: To comply with legal obligations and industry regulations.</p>

    </div>

    <div id="policy-content-3" class="policy-content">
        <h2>3. Information Sharing</h2>
        <p><b>We may share your information under the following circumstances:</b></p>
        <p> With Your Consent: When you explicitly grant us permission to share your information.</p>
        <p> Service Providers: Trusted third parties assisting us in delivering our services (e.g., cloud storage, analytics, and customer support).</p>
        <p> Legal Obligations: When required by law or in response to valid legal requests.</p>
    </div>

    <div id="policy-content-4" class="policy-content">
        <h2>4. Your Choices and Rights</h2>
        <p><b>You have the right to:</b></p>
        <p> Access, Correct, or Delete Your Information: You can request access, correction, or deletion of your personal information by contacting us.</p>
        <p> Opt-Out of Communications: You can opt-out of receiving promotional communications from us at any time.</p>
        <p> Data Portability: You may request a copy of your data in a structured, machine-readable format.</p>
    </div>

    <div id="policy-content-5" class="policy-content">
        <h2>5. Security Measures</h2>
        <p>We employ industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, and destruction.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>6. Changes to this Policy</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    </div>

    <div id="policy-content-7" class="policy-content">
        <h2>7. Contact Us</h2>
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us at:</p>
        <p>info@bactrack.com</p>
    </div>


    <h1>Frequently Asked Questions</h1>

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
                    For any support or inquiries, please reach out to our support team at support@bactrack.com.
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

        <div class="question-answer">
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
