<html>
<head>
    <title>Register Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- ...Your existing HTML code... -->

    <div class="cont">
        <h3 style="text-align:center">You have not Registered Your attendance for this Unit</h3>
        <br><br>
        <div class="submit">
            <!-- Add an event listener to the button for fingerprint scanning -->
            <input type="submit" name="action" value="Scan Fingerprint" id="scanButton">
        </div>

        <!-- Add a hidden input field to store the fingerprint data -->
        <input type="hidden" id="fingerprintData" name="fingerprintData">
    </div>

    <!-- Include the JavaScript code for WebAuthn integration -->
    <script>
        // Function to handle the fingerprint scanning process
        function scanFingerprint() {
            if (typeof PublicKeyCredential === "undefined") {
                alert("WebAuthn not supported in this browser. Please use a modern browser.");
                return;
            }

            // Call the WebAuthn API to perform the fingerprint authentication
            navigator.credentials.get({ publicKey: { challenge: new Uint8Array(32), authenticatorSelection: { userVerification: "required" } } })
            .then((credential) => {
                // Get the fingerprint data from the credential response
                const fingerprintData = credential.response.clientDataJSON;
                
                // Set the fingerprint data to the hidden input field
                document.getElementById("fingerprintData").value = JSON.stringify(fingerprintData);
                
            })
            .catch((error) => {
                console.error("Fingerprint authentication failed:", error);
                alert("Fingerprint authentication failed. Please try again.");
            });
        }

        // Add an event listener to the "Scan Fingerprint" button
        document.getElementById("scanButton").addEventListener("click", scanFingerprint);
    </script>
</body>
</html>
