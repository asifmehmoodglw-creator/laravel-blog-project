<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
         .delete-card {
            background: #ffffff;
            width: 320px;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: black;
        }

        /* Heading */
        .delete-card h3 {
            margin: 0 0 20px 0;
            color: white;
            font-size: 20px;
            font-weight: 600;
            /* background-color: #F3E5AB; */
        }
        .delete-card p{
            color: white;
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
        .modal-overlay{
            position: fixed;
            margin-left: 150px;
            margin-top: 50px;
            z-index: 99999;
            /* background-color: black; */

        }


        .star-rating {
    display: flex;
    flex-direction: row-reverse; /* Left-to-right fill karne ke liye reversal */
    justify-content: center;
    gap: 4px;
}

/* Default hidden radio inputs */
.star-rating input[type="radio"] {
    display: none;
}

/* Default Star Icon Style */
.star-rating label {
    font-size: 32px;
    color: #ccc; /* Unselected Star Gray Color */
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}

/* Hover over star & preceding stars */
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffc107; /* Gold Color */
}

/* Selected state (checked star & preceding stars) */
.star-rating input[type="radio"]:checked ~ label {
    color: #ffc107;
}
.rate input[type="radio"] {
        display: none;
    }
    /* Stars ki positioning aur sizing */
    .rate {
        display: inline-block;
        border: 0;
    }
    .rate > label {
        color: #ccc;
        float: right;
        font-size: 30px;
        cursor: pointer;
        padding: 0 2px;
    }
    /* Hover aur Checked status par color change karna */
    .rate > input:checked ~ label,
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #ffc107;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked ~ label:hover,
    .rate > label:hover ~ input:checked ~ label,
    .rate > input:checked ~ label:hover ~ label {
        color: #e6b800;
    }
    .inplast{
        
        height: 40px; 
        
        border: 1px solid black;
        border-radius: 15px;
        width: 80%;
        margin-left: 10%;
        /* border-right: none; */
    }
    .unl{
         display: flex;
         flex-direction: column;
         width: 50%;
         justify-content: center;
         margin-left: 25%;
         
    }
    .unl {
        max-height: 220px; 
        overflow-y: auto; 
        overflow-x: hidden; 
        list-style: none;
        /* padding-left: 10px 5px; */
        margin: 0;
        width: 80%;
        margin-left: 10%;
       }


       .unl::-webkit-scrollbar {
        width: 10px;
        }

        .unl::-webkit-scrollbar-thumb {
         background-color: #cbd5e1;
        border-radius: 4px;
        }
    .li{
       
        border: 1px #E8E9EB; 
        margin: 5px; 
        /* margin-left: 200px; */
        border-radius: 10px; 
        width: 100%; 
        background-color: #E8E9EB;"
        height: auto;
        
        
    } 
    .input-wrapper{
        position: relative;
        width: 100%;
    }
    .input-wrapper input {
    width: 80%;
    padding: 10px 45px 10px 15px;
    border: 1px solid #000;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
}
.input-wrapper button {
    position: absolute;
    right: 82px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
} 

     /* .button{
        font-size:25px; 
        position: ; 
        right:10; 
        background: transparent; 
        border: none; 
        cursor: pointer;" 
        }*/
    
    @media(max-width: 600px){
       .main-div{
            display: flex;
            flex-direction: column;
            row-gap: 20px;

       } 
       .edit-del {
        display: flex;
        justify-content: flex-end;
       }   

    }
    @media(max-width: 320px){
       .main-div{
            display: flex;
            flex-direction: column;
            row-gap: 20px;

       } 
       .edit-del {
        display: flex;
        justify-content: flex-end;
       } 
        
       .li{
        width: 150%; 
        
       } 
       .inplast{
        width: 140%;
        margin-left: 0%; 
       }
       .unl{
        margin-top: 20px;
        margin-left: 0%;
        width: 96%;

       }
       .rate{
        display: flex;  
        flex-direction: row-reverse;
        /* flex-wrap: no-wrap; */
       }
       

    }
    @media(max-width: 600px){
       .main-div{
            display: flex;
            flex-direction: column;
            row-gap: 20px;

       } 
       .edit-del {
        display: flex;
        justify-content: flex-end;
       }  
       .li{
        width: 140%; 
        margin-top: 10px;
       } 
       .inplast{
        width: 140%; 
       }


    }
    </style>
    <!-- Body close tag (</body>) se pehle yeh JS file lazmi ho -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/my-script.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased py-10">

    <main class="max-w-3xl mx-auto px-4">
        
        <!-- Back Link -->
        <div class="mb-6">
            <a href="/" class="text-blue-500 hover:text-blue-600 font-medium text-sm flex items-center gap-1">
                &larr; Back to Posts
            </a>
        </div>

        <!-- Single Column Post Card -->
        <article class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-6">
            
            <!-- 1. Top Image -->
            <div class="w-full">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full max-h-[400px]  rounded-xl">
            </div>

            <!-- 2. Title & Published Date -->
            <div class="space-y-2">
                <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                    {{ $post->title }}
                </h1>
                <p class="text-sm text-gray-400">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
            </div>
             <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>
                 <hr class="border-black-100 ">


    <div id="deleteModal-{{ $post->id }}" class="modal-overlay" style="display: none; margin: 70;" >      
       <div class="delete-card " >
              <h3>Delete Item</h3>
              <p>Are you Sure?</p><br>
        
            <div class="button-group">
                <!-- Cancel Action -->
            
                <button type="button" class="btn btn-cancel" onclick="closeModal('{{ $post->id }}')">Cancel</button>

                <!-- Delete Form Action -->
                <form action="{{ route('post.delete', $post) }}" method="POST" style="flex: 1; margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" style="width: 100%;">Delete</button>
                </form>
            
            </div>
        </div>
    </div>


              <!-- 4. Post Content -->
            <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                {!! $post->body !!}
            </div>
           

            <hr class="border-black-100 my-2">

             <!-- 3. Author Info -->

<div class="main-div" style='display: flex;  justify-content: space-between;'>

        <div class="img-name-form" style="display: flex; column-gap: 10px;">

           <div id="name-img" class="flex items-center gap-3 pt-2">
                       <img src="/images/lary-avatar.svg" alt="Author avatar" class="w-10 h-10 rounded-full">
                           <div>
                                <h3 class="text-sm font-bold text-gray-900">{{ $post->author->name }}</h3>
                            </div>
            </div>




            <div class="form">

                      @if(auth()->user())
                           <form action="{{ route('card-rate') }}" method="POST" id="ratingForm">
                           @csrf
       
        
                            <input type="hidden" name="card_id" value="{{$post->id}}"> <!-- Card ID -->

                       <div class="rate" >
                            <input type="radio" id="star5-{{ $post->id }}" name="rating" value="5"/>
                            <label for="star5-{{ $post->id }}" title="5 stars">&#9733;</label>
            
                            <input type="radio" id="star4-{{ $post->id }}" name="rating" value="4" />
                            <label for="star4-{{ $post->id }}" title="4 stars">&#9733;</label>
            
                            <input type="radio" id="star3-{{ $post->id }}" name="rating" value="3" />
                            <label for="star3-{{ $post->id }}" title="3 stars">&#9733;</label>
            
                            <input type="radio" id="star2-{{ $post->id }}" name="rating" value="2"  />
                            <label for="star2-{{ $post->id }}" title="2 stars">&#9733;</label>
            
                            <input type="radio" id="star1-{{ $post->id }}" name="rating" value="1" />
                            <label for="star1-{{ $post->id }}" title="1 star">&#9733;</label>
                       </div>
                       </form>
                    @endif
        
 
            </div>
        </div>


        
        <div class="edit-del" style="display: flex; ">
               
                   @can('update-post', $post)
                     <div>
                        <!-- Edit Button -->
                          <a href="{{ route('post.edit', $post) }}" 
                          class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300
                           rounded-full py-2 px-8">
                          Edit
                          </a>
                    </div>
      
   

                   <div>   
      
                       <button id="btn-delete" type="submit" 
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 
                       rounded-full py-2 px-8"
                       onclick="openModal('{{ $post->id }}')">
                       Delete
                       </button>
                        {{-- </form> --}}
                   </div>
        </div> 
</div>

        <br>


    
    
@endcan
        </article>
@auth
    

    <div style="display:flex;">
         
            <div style='display: flex; gap: 10px; '>
                        <span style="font-size:25px;"><i class="fa-regular fa-comment "></i></span>          
                        <h2 style="font-size: 25px;"><b> Comments</b></h2></div>
            </div>
           <div style="display: flex; flex-direction: column; justify-content: center;" id="commentContainer">
        
               <ul class="unl" id="commentsList">
                  @foreach ($post->comments as $comment)
                    <li class="li" >
                        <strong>{{ $comment->author->name ?? 'User' }}:</strong><span class="text-sm text-gray-400">
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                        </span>
                       <p>{{ $comment->body }}</p>
                    </li>
                  @endforeach
               </ul>
            </div>
        <div>
        <form id="commentForm" action="{{ route('comment',$post->id) }}" method="POST">
            @csrf
            <div class="input-wrapper">
            <input  type="text" name="body" id="commentInput" placeholder=" your comments..." class="inplast " style="height: 40px;">
            <button class="button"  type="submit"><i  class="fa-regular fa-paper-plane"></i></button>
            </div>
        </form>
        </div>
    <div>
   @endauth
</main>
        
    <script>
    function openModal(id) {
        document.getElementById('deleteModal-' + id).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById('deleteModal-' + id).style.display = 'none';
    }
   
  

document.getElementById('commentForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const form = this;
    const input = document.getElementById('commentInput');
    const commentsList = document.getElementById('commentsList');

    try {

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

        if (data.success) {

            const li = document.createElement('li');

            li.className = 'li';

            li.innerHTML = `
                <strong>${data.comment.author_name}:</strong>
                <span class="text-sm text-gray-400">
                    <time>${data.comment.created_at}</time>
                </span>
                <p>${data.comment.body}</p>
            `;

            commentsList.appendChild(li);

            // input khali
            input.value = '';
        }

    } catch (error) {

        console.error(error);
        alert('Comment post nahi ho saka');

    }

});



document.querySelectorAll('#ratingForm input[name="rating"]').forEach(function(star) {

    star.addEventListener('change', function() {

        const form = document.getElementById('ratingForm');

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {
                console.log(data.message);

                // Optional success message
                // alert(data.message);
            }

        })
        .catch(error => {
            console.error('Error:', error);
        });

    });

});
</script>
</body>
</html>