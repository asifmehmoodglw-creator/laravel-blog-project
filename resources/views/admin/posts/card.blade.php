<html>
    <head>
        <title>Card</title>
<style>
        /* body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */

        /* Simple Confirmation Card */
        .delete-card {
            background: #ffffff;
            width: 320px;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Heading */
        .delete-card h3 {
            margin: 0 0 20px 0;
            color: #333333;
            font-size: 20px;
            font-weight: 600;
        }

        /* Button Container */
        .button-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        /* Base Button Styles */
        .btn {
            flex: 1;
            padding: 10px 0;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        /* Cancel Button */
        .btn-cancel {
            background-color: #e0e0e0;
            color: #333333;
        }

        .btn-cancel:hover {
            background-color: #d0d0d0;
        }

        /* Delete Button */
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-delete:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>

    <!-- Simple Delete Confirmation Card -->
    <div class="delete-card">
        <h3>Delete Item</h3>
        
        <div class="button-group">
            <!-- Cancel Action -->
            <button type="button" class="btn btn-cancel">Cancel</button>

            <!-- Delete Form Action -->
            <form action="#" method="POST" style="flex: 1; margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" style="width: 100%;">Delete</button>
            </form>
        </div>
    </div>
</body>    
</html>