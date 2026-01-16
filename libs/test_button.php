<!DOCTYPE html>
<html>
<head>
    <title>Button Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .quote-system-container {
            margin: 20px;
            padding: 20px;
            background: #f0f0f0;
        }
        #quote-request-btn {
            background: #28a745;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Teklif Al Buton Test</h1>
    
    <div class="quote-system-container">
        <button id="quote-request-btn" class="btn btn-primary btn-lg" 
                data-listing-id="1" 
                data-category-id="1">
            <i class="fa fa-envelope"></i> Teklif Al
        </button>
    </div>

    <script>
        $(document).ready(function() {
            console.log('Page loaded');
            $('#quote-request-btn').show();
            console.log('Button should be visible now');
            
            $('#quote-request-btn').click(function() {
                alert('Teklif Al butonuna tıklandı! Listing ID: ' + $(this).data('listing-id'));
            });
        });
    </script>
</body>
</html> 