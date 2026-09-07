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
    </head>
    <body>
         <div class="form-container">
        <div class="form-header">
            <h2>Create New Post</h2>
        </div>
        @if ($errors->any())
    <div style="color: red; background: #fee2e2; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form method="POST" action="{{  route('posted') }}" enctype="multipart/form-data" id="postForm" >
            @csrf
           <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" id="title" name="title" required placeholder="Enter post title...">
            </div>

            <!-- Two Column Row: Category & Thumbnail -->
            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option  value="{{ $category->id }}">{{ $category->name}}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail Image</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                </div>
            </div>

            <!-- Excerpt -->
            <div class="form-group">
                <label for="excerpt">Excerpt (Short Summary)</label>
                <textarea id="excerpt" name="excerpt" rows="2" placeholder="Write a brief overview of the post..."></textarea>
            </div>

            <!-- Main Body -->
            <div class="form-group">
                <label for="editor">Body Content</label>
                <textarea id="editor" name="body" placeholder="Write your full article content here..." required></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="form-actions">
                <button type="submit" name="status" value="draft" class="btn btn-secondary">Save Draft</button>
                <button type="submit" name="status" value="published" class="btn btn-primary">Publish Post</button>
            </div> 
        </form>
    </div>

   <div id="successModal" class="modal-overlay">
  <div class="modal-card">
    <div class="success-icon">&#10004;</div>
    <h3>Success!</h3>
    <p>Aap ka form kamyabi se submit ho gaya hai.</p>
    <button type="button" onclick="closeModal()">OK</button>
  </div>
</div>
     <script>
     document.getElementById('postForm').addEventListener('submit', async function(e) { 
    e.preventDefault(); 
    const form = this; 
    const clickedButton = e.submitter; 

    try {
        clickedButton.disabled = true; 
        const originalText = clickedButton.innerText; 
        clickedButton.innerText = 'Saving...'; 
        
        const formData = new FormData(form); 
        formData.set('status', clickedButton.value); 

        const response = await fetch(form.action, { 
            method: 'POST', 
            body: formData, 
            headers: { 
                'Accept': 'application/json', 
                'X-Requested-With': 'XMLHttpRequest' 
            } 
        }); 

        const data = await response.json(); 
        console.log(data); 

        if (response.ok && data.success) { 
            // 1. Success Message Modal Card me dikhane ke liye
            showModal(data.message || 'Post kamyabi se save ho gayi hai!'); 
            form.reset(); 
        } else { 
            // 2. Validation Errors ya dusri errors ko Modal Card me dikhane ke liye
            if (data.errors) { 
                let errors = []; 
                Object.values(data.errors).forEach(function(fieldErrors) { 
                    errors.push(...fieldErrors); 
                }); 
                showModal(errors.join('<br>')); 
            } else { 
                showModal(data.message || 'Post save nahi ho saki.'); 
            } 
        } 

        clickedButton.innerText = originalText; 
        clickedButton.disabled = false; 

    } catch (error) {
        console.error(error); 
        // 3. Network error bhi Modal Card me
        showModal('Something went wrong!'); 
        clickedButton.disabled = false; 
        clickedButton.innerText = clickedButton.value === 'draft' ? 'Save Draft' : 'Publish Post';
    } 
});

// Modal Card Functions
function showModal(message) {
    const modal = document.getElementById('successModal');
    const messageElement = modal.querySelector('p');
    
    if (messageElement) {
        messageElement.innerHTML = message;
    }
    
    modal.style.display = 'flex';
}

function closeModal() {
    document.getElementById('successModal').style.display = 'none';
}
                                          </script>

    </body>
</html>
