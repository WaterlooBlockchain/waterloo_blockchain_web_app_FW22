# Table of content
1. [Project architecture & Design choices](#project-architecture-and-design-choices)
    - [Design Patterns](#design-patterns)
    - [Technology Stack](#technology-stack)
2. [Environment Setup](#environment-setup)
    - [With DevContainers](#prerequesites-for-dev-containers)

## Project Architecture and Design Choices
MVC  
## Design Patterns
## Technology Stack
- PHP + Laravel
## Environment Setup
In order to simplify the developer experience, we recommend the usage of devcontainers.

The main advantage of using devcontainers is to insure a consistent development environment for everyone.

### Prerequesites for Dev Containers
1. Install Docker on your machine
    - [Windows](https://docs.docker.com/desktop/install/windows-install/)
    - [Mac OS](https://docs.docker.com/desktop/install/mac-install/)
    - [Linux](https://docs.docker.com/desktop/install/linux-install/) (Make sure to follow the specific instructions for your distro)
2. Install [VSCode](https://code.visualstudio.com/docs/setup/setup-overview)
3. Install Devcontainer extension
    - [Tutorial](https://code.visualstudio.com/docs/editor/extension-marketplace) for installing extensions
    - Make sure that the extension id is: ```ms-vscode-remote.remote-containers```

### How to launch the project locally using Dev Containers
1. Open the project in VSCode
2. If it's the first time launching the project (missing .env file) please execute these steps before opening the project in a devcontainer
    - ```cp .env.example .env```
    - Change DB_PASSWORD to DB_PASSWORD=mariadb
    - Launch the container
3. After the container has started:
    - All the dependencies should be installed automatically
    - The database should be populated with test data
    - The web client should launch