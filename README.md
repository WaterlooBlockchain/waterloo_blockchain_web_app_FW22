This is UW Blockchain Club's Website.

# Environment Setup
## Dependencies for running the project locally
1. Install Node.js on your machine
    - [Windows](https://nodejs.org/en/download/)
    - [MacOS](https://changelog.com/posts/install-node-js-with-homebrew-on-os-x)
    - [Linux](https://nodejs.org/en/download/package-manager/) (Make sure to select the right package manager for your distro)

## How to launch the project locally
1. From the root project folder open a terminal:

    ```cd app && npm install && npm run dev```
## Prerequesites for Dev Containers
1. Install Docker on your machine
    - [Windows](https://docs.docker.com/desktop/install/windows-install/)
    - [Mac OS](https://docs.docker.com/desktop/install/mac-install/)
    - [Linux](https://docs.docker.com/desktop/install/linux-install/) (Make sure to follow the specific instructions for your distro)
2. Install [VSCode](https://code.visualstudio.com/docs/setup/setup-overview)
3. Install Devcontainer extension
    - [Tutorial](https://code.visualstudio.com/docs/editor/extension-marketplace) for installing extensions
    - Make sure that the extension id is: ```ms-vscode-remote.remote-containers```

## How to launch the project locally using Dev Containers
1. Open the project in VSCode
2. Quick start: Open an existing folder in a container ([Tutorial](https://code.visualstudio.com/docs/devcontainers/containers))
    - Start VS Code, run the ```Dev Containers: Open Folder in Container...``` command (or something similar) from the Command Palette (F1 or Command-Shift-P for Mac users) or quick actions Status bar item, and select the project folder you would like to set up the container for.
3. After the container has started, all the dependencies should be installed automatically, and the react client should launch