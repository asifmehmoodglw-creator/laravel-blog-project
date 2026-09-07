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
            height: auto;
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
    </style>
    </head>
    <body>
         <div class="form-container">
        <div class="form-header">
            <h2>Edit this Post</h2>
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
        <form method="POST" action="{{ route('post.update' , $post->id) }}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
           <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required placeholder="Enter post title...">
            </div>

            <!-- Two Column Row: Category & Thumbnail -->
            <div class="form-row" >
                <div class="form-group">
                    <label for="category" >Category</label>
                    <select id="category" name="category_id"  required >
                        <option >Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach 
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail Image</label>
                    <input type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $post->thumbnail) }}" accept="image/*">
                   
                </div>
            </div>

            <!-- Excerpt -->
            <div class="form-group">
                <label for="excerpt">Excerpt (Short Summary)</label>
                <textarea id="excerpt" name="excerpt"   rows="2" placeholder="Write a brief overview of the post...">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <!-- Main Body -->
            <div class="form-group">
                <label for="editor">Body Content</label>
                <textarea id="editor" name="body"  placeholder="Write your full article content here..." required>{{ old('body', $post->body) }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="form-actions">
                {{-- <button type="submit" name="status" value="draft" class="btn btn-secondary">Save Draft</button> --}}
                <button type="submit" name="status" value="published" class="btn btn-primary">Update Post</button>
            </div> 
        </form>
    </div>
    </body>
</html>
