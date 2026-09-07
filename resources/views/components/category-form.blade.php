<html>
    <head>
        <title>Create Post</title>

        
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        /* Container Card */
        .form-container {
            background: #ffffff;
            width: 100%;
            max-width: 800px;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        .form-header {
            margin-bottom: 24px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 16px;
        }

        .form-header h2 {
            font-size: 1.5rem;
            color: #0f172a;
            font-weight: 700;
        }

        /* Form Controls Layout */
        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* Labels & Inputs */
        label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px 14px;
            font-size: 0.95rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background-color: #ffffff;
            color: #1e293b;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        /* Focus States */
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* File Input Custom Style */
        input[type="file"] {
            padding: 8px;
            background-color: #f1f5f9;
            cursor: pointer;
        }

        /* Textarea Adjustments */
        textarea {
            resize: vertical;
            min-height: 100px;
            line-height: 1.5;
        }

        #editor {
            min-height: 220px;
        }

        /* Buttons Action Bar */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #475569;
        }

        .btn-secondary:hover {
            background-color: #cbd5e1;
        }
        .link1{
            display: flex;
            justify-content: center;
            color: black;

        }
        .link{
            display: flex;
            justify-content: center;
            color: black;
            margin-left: 60px;


        }
        /* .Form{
            display: flex;
            justify-content: center;
        } */



         
        .modal-overlay {
  display: none; 
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Background darken effect */
  z-index: 1000;
  justify-content: center;
  align-items: center;
}

/* Center Modal Card */
.modal-card {
  background: #ffffff;
  padding: 30px 20px;
  border-radius: 12px;
  width: 90%;
  max-width: 380px;
  text-align: center;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  animation: fadeIn 0.3s ease-in-out;
}

/* Green Check Icon */
.success-icon {
  width: 50px;
  height: 50px;
  background: #28a745;
  color: #fff;
  font-size: 24px;
  line-height: 50px;
  border-radius: 50%;
  margin: 0 auto 15px;
}

.modal-card h3 {
  margin: 0 0 8px;
  color: #333;
}

.modal-card p {
  color: #666;
  font-size: 14px;
  margin-bottom: 20px;
}

.modal-card button {
  background: #28a745;
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 15px;
}

.modal-card button:hover {
  background: #218838;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
    
           
        <div class="mb-6">
            <a href="/" class="text-blue-500 hover:text-blue-600 font-medium text-sm flex items-center gap-1">
                &larr; Back to Posts
            </a>
        </div>
        
        {{-- @dd($values) --}}
         <div class="form-container">
        <div class="form-header">
            <h2>Add Category</h2>
        </div>
        <div id="categoryMessage"
        style="display:none; padding:12px 20px; margin-bottom:15px; border-radius:5px;">
</div>
      
        <form method="POST" action="{{  route('categoryform') }}" enctype="multipart/form-data" id="categoryForm">
            @csrf
           <div class="form-group" id="input-wrapper">

              
                <label for="title">Name</label>
                <input type="text" id="name" name="name" required placeholder="name..." >
            </div>
            <div class="form-group" id="input-wrapper">
                <label for="title">Slug</label>
                <input type="text" id="slug" name="slug" required placeholder="slug...">
            </div>

                    
           
            <div class="form-actions">
                
                {{-- <button name="close" value="close" class="btn btn-primary">Close</button> --}}
                
                <button type="submit" name="status" value="published" class="btn btn-primary">Add Category</button>
                  
            </div> 
             
        
           
        </form>
         <div id="successModal" class="modal-overlay">
  <div class="modal-card">
    <div class="success-icon">&#10004;</div>
    <h3>Success!</h3>
    <p>Category Successfully Saved.</p>
    <button type="button" onclick="closeModal()">OK</button>
  </div>
</div>

        <table border=1 style='width: 100%;'>
            <thead>
            <tr>
                <th>NAME</th>
                <th>SLUG</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
        <tbody>
            

            
           @foreach($values as $value)
           <tr>
           <td>{{ $value->name }}</td>
           <td>{{ $value->slug }}</td>
           <td><a href="{{ route('editcategory',$value->id) }}" class="link1"><i class="fa-solid fa-pen-to-square"></i></a></td>
           <form class="Form" method="POST" action="{{ route('deletecategory',$value->id) }}">
            @csrf
            @method('DELETE')
           <td><button  class="link"><i class="fa-solid fa-trash"></i></a></td>
           </form>   
        </tr>
           @endforeach
        
        </tbody>
        </table>
       
    </div>



    <script>
    document.getElementById('categoryForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const form = this;
    const button = form.querySelector('button[type="submit"]');
    const originalText = button ? button.innerText : 'Add Category';

    try {
        if (button) {
            button.disabled = true;
            button.innerText = 'Saving...';
        }

        const response = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();
        console.log(data);

        if (response.ok && data.success) {
            // 1. Success Message Modal Card me dikhane ke liye
            showModal(data.message || 'Category Successfully Saved!');
            
            // 2. Form Reset
            form.reset();
        } else {
            // 3. Validation errors ya server errors ke liye
            if (data.errors) {
                let errors = [];
                Object.values(data.errors).forEach(function(fieldErrors) {
                    errors.push(...fieldErrors);
                });
                showModal(errors.join('<br>'));
            } else {
                showModal(data.message || 'Category save nahi ho saki.');
            }
        }

    } catch (error) {
        console.error(error);
        showModal('Category save nahi ho saki. Connection fail ho gaya.');
    } finally {
        if (button) {
            button.disabled = false;
            button.innerText = originalText;
        }
    }

});

// Modal Control Functions (agar same JS file mein na hon to yeh add rakhein)
function showModal(message) {
    const modal = document.getElementById('successModal');
    if (modal) {
        const messageElement = modal.querySelector('p');
        if (messageElement) {
            messageElement.innerHTML = message;
        }
        modal.style.display = 'flex';
    }
}

function closeModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.display = 'none';
    }
}
    </script>
    </body>
</html>
