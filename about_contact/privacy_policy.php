<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Privacy Policy - BacTrack</title>
</head>

<body>
    <h1>Privacy Policy</h1>

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
        <p> Contact Information: Such as email address for communication purposes.</p>
            <h3>1.2. Non-Personal Information</h3>
        </p>
        <p> Usage Data: Information about your interactions with our services, such as pages visited, features used, and duration of use in he form of cookies.</p>
    </div>

    <div id="policy-content-2" class="policy-content">
        <h2>2. How do we collect your data</h2>
        <p><b>We use the information we collect for the following purposes:</b></p>
        <p> Providing Services: To track and analyze antibiotic combination therapies for better healthcare outcomes.</p>
        <p> Communication: To send relevant updates, notifications, and respond to inquiries.</p>git p
        <p> Compliance: To comply with legal obligations and industry regulations.</p>
    </div>

    <div id="policy-content-2" class="policy-content">
        <h2>3. How do we Use Your Information</h2>
        <p><b>We use the information we collect for the following purposes:</b></p>
        <p> Providing Services: To track and analyze antibiotic combination therapies for better healthcare outcomes.</p>
        <p> Communication: To send relevant updates, notifications, and respond to inquiries.</p>
        <p> Research and Analysis: Aggregated and anonymized data may be used for research and analysis to improve our services.</p>
        <p> Compliance: To comply with legal obligations and industry regulations.</p>
    </div>

    <div id="policy-content-3" class="policy-content">
        <h2>4. How do we store your data</h2>
        <p><b>We may share your information under the following circumstances:</b></p>
        <p> With Your Consent: When you explicitly grant us permission to share your information.</p>
        <p> Service Providers: Trusted third parties assisting us in delivering our services (e.g., cloud storage, analytics, and customer support).</p>
        <p> Legal Obligations: When required by law or in response to valid legal requests.</p>
    </div>

    <div id="policy-content-4" class="policy-content">
        <h2>5. Your Choices and Rights</h2>
        <p><b>You have the right to:</b></p>
        <p> Access, Correct, or Delete Your Information: You can request access, correction, or deletion of your personal information by contacting us.</p>
        <p> Opt-Out of Communications: You can opt-out of receiving promotional communications from us at any time.</p>
        <p> Data Portability: You may request a copy of your data in a structured, machine-readable format.</p>
    </div>

    <div id="policy-content-5" class="policy-content">
        <h2>6. How do we use cookies</h2>
        <p>We employ industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, and destruction.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>7. What type of cookies do we use</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>8. How to manage cookies</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>9. Security measures</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>10. Changes to this policy</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
    </div>

    <div id="policy-content-7" class="policy-content">
        <h2>11. Contact Us</h2>
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us at:</p>
        <p><a href="mailto:bactrack2023@gmail.com">bactrack2023@gmail.com</a></p>
    </div>

</body>