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
        <select id="policy-dropdown" onchange="showPolicy()">
            <option value="0">Select a section</option>
            <option value="1">Information We Collect</option>
            <option value="2">How do we collect your data</option>
            <option value="3">How do we Use Your Information</option>
            <option value="4">How do we store your data</option>
            <option value="5">Your Choices and Rights</option>
            <option value="6">Cookies</option>
            <option value="7">Changes to this policy</option>
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
        <p><b>You give Our Company most of the information we gather. We collect and handle data when you: </b></p>
        <li>Use or visit our website through your browser's cookies.</li>
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
        <p>Our company retains your data for a duration of four months. After this period concludes, we ensure complete removal by erasing it from our database.</p>
        
    </div>

    <div id="policy-content-5" class="policy-content">
        <h2>5. Your Choices and Rights</h2>
        <p><b>You have the right to:</b></p>
        <p> Access, Correct, or Delete Your Information: You can request access, correction, or deletion of your personal information by contacting us.</p>
        <p> Opt-Out of Communications: You can opt-out of receiving promotional communications from us at any time.</p>
        <p> The right to rectification: You have the right to request that Our Company amend any information you believe to be inaccurate. Additionally, you have the right to request Our Company to supplement any information you believe to be incomplete.</p>
    </div>

    <div id="policy-content-6" class="policy-content">
        <h2>6. Cookies</h2>
        <p>Cookies are text files placed on your computer to collect standard Internet log information and visitor behavior information. When you visit our websites, we may collect information from you automatically through cookies or similar technology.</p>
        
        <h3><b>6.1. How do we use cookies</b></h3>
        <p>Our Company utilizes cookies for various purposes to enhance your website experience, such as:</p>
        <li>Maintaining your signed-in status.</li>

        <h3><b>6.2. What type of cookies do we use</b></h3>
        <p>Session cookies: At BacTrack, we implement session cookies to elevate your browsing experience. These cookies are temporary and remain on your device solely for the duration of your current session. When you conclude your browsing session, please be aware that they will persist until manually deleted by you, rather than being automatically removed.</p>
    
        <h3><b>6.3. How to manage cookies</b></h3>
        <p>You have the option to configure your browser to decline cookies, and the aforementioned website provides instructions on how to delete them from your browser. It's important to note that in a few instances, disabling cookies may impact the functionality of certain features on our website.</p>
    </div>

    <div id="policy-content-7" class="policy-content">
        <h2>7. Changes to this policy</h2>
        <p>We may update this Privacy Policy periodically to reflect changes in our practices or for legal compliance. You will be notified of any significant changes.</p>
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us at: <a href="contactus.php">here</a></p>
    </div>

</body>