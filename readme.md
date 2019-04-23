Base requirements for the api and authenication

API requirements

1. Return a JSON response for all APIs and allow caching where approopriate
2. A task has an ID, title, description, deadline date and a completion status
3. Return a list of details for all task for a user using a url of : /tasks
4. Return a list of details fot all task for a user with pagination using a URL of: /tasks/page/{:page}
5. Return a list of details for a single task for a user using a URL of /tasks/{:taskid}
6. Return a list of details for all incomplete tasks for a user using a URL of: /tasks/incomplete
7. Return a list of details for all completed tasks for a user using a URL of: /tasks/complete
8. Delete a task for a user using a URL of: /tasks/{:taskid}
9. Update title, descriptiom, deadline date or completion status adn return updated task using a URL of: /tasks/{:taskid}
10. Create a new task and return the details for the new task using a URL of: /tasks

Authentication requirements

1. Retrun a JSON respnse for all APIs
2. A user has an ID, Full name, unique username, hashed password, user active status and login attempts
3. A user can log in on more than one device and should not log out a previous device (sessions)
4. Create a new user using a URL of: /users
5. Log in a user usinf a url of: /sessions
6. log out a user using a url of: /sessions/{:sessionid}
7. Limited lifetime of a session access token, refreshed using a url of: /sessions/{:sessionid}
