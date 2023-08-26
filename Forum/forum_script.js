// Sample data for discussion threads and comments
const discussions = {
    'upcycling-ideas': {
        title: 'Upcycling Ideas',
        description: 'Share and discuss creative upcycling ideas.', 
        comments: [
            { user: 'Alice', content: 'Great idea! I love upcycling old furniture.' },
            { user: 'Samuel', content: 'I tried upcycling old clothes and turned them into trendy accessories.' }
        ]
    },
    'upcycling-tips': {
        title: 'Upcycling Tips',
        description: 'Get and give tips for successful upcycling projects.', 
        comments: [
            { user: 'Bernice', content: 'Here\'s a tip: Use old denim for sturdy upcycled projects.' }
        ]
    },
    'upcycling-showcase': {
        title: 'Stitching Techniques',
        description: 'Tips and tricks for stitching.', 
        comments: [
            { user: 'Queenie', content: ' A tip I have is to run your thread through wax. It\'s so much easier.' },
            { user: 'Amanda', content: 'Anyone has any tips on how to master an overcast stitch? Thanks in advance!' }
        ]
    },
    // Add more discussion threads here
};

// Add event listener to show the new discussion form
const newDiscussionButton = document.getElementById('newDiscussionButton');
const newDiscussionForm = document.getElementById('newDiscussionForm');

newDiscussionButton.addEventListener('click', function () {
    newDiscussionForm.style.display = 'block';
});

// Add event listener to handle new discussion form submission
const createDiscussionForm = document.getElementById('newDiscussionForm');

createDiscussionForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const newDiscussionTitle = document.getElementById('newDiscussionTitle').value;
    const newDiscussionDescription = document.getElementById('newDiscussionDescription').value;
    if (newDiscussionTitle.trim() !== '') {
        const newDiscussionId = newDiscussionTitle.toLowerCase().replace(/\s+/g, '-');
        discussions[newDiscussionId] = {
            title: newDiscussionTitle,
            description: newDiscussionDescription, // Set the provided description
            comments: []
        };
        createDiscussionForm.reset();
        newDiscussionForm.style.display = 'none';
        populateDiscussionList();
    }
});

// Function to populate the discussion list
function populateDiscussionList() {
    const discussionList = document.querySelector('.discussion-items');
    discussionList.innerHTML = '';
    for (const discussionId in discussions) {
        const discussion = discussions[discussionId]; // Fetch the discussion object
        discussionList.innerHTML += `
            <li class="discussion-item" onclick="showDiscussion('${discussionId}')">
                <h3>${discussion.title}</h3>
                <p>${discussion.description}</p> <!-- Use discussion description here -->
            </li>
        `;
    }
}

// Call this function to populate the discussion list initially
populateDiscussionList();

function showDiscussion(discussionId) {
    var discussion = discussions[discussionId];

    var discussionContent = document.querySelector('.discussion-content');
    discussionContent.innerHTML = `
        <div class="discussion-title">${discussion.title}</div>
        <ul class="discussion-comments">
            ${discussion.comments.map(comment => `
                <li class="comment">
                    <div class="comment-user">${comment.user}</div>
                    <div class="comment-content">${comment.content}</div>
                </li>
            `).join('')}
        </ul>
        <form id="commentForm">
            <input type="text" id="newComment" placeholder="Add a comment...">
            <button type="submit">Post Comment</button>
        </form>
    `;

    // Attach a submit event listener to the comment form
    var commentForm = document.getElementById('commentForm');
    commentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        var newComment = document.getElementById('newComment').value;
        if (newComment.trim() !== '') {
            discussion.comments.push({ user: 'You', content: newComment });
            showDiscussion(discussionId); // Refresh the discussion content with the new comment
        }
    });
}
