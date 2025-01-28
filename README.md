## Running App Instructions

1. Clone the repository to your computer:
   ```sh
   git clone https://github.com/hrvojesesar/wunder-test.git
   ```
2. Open the project with editor like Visual Studio Code.
3. Insert external api from task in **docker.compose.yml** file in "command" section.
5. Using the terminal, go to project directory:  <br>
   `wunder-test`
6. Run commands: <br/>
   `docker compose build` <br/>
   `docker compose up -d` <br/>
7. Import **wunder_db.sql** from project to MySQL container.
