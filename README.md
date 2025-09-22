# How to use this repository
Download the repository and use DDEV with *ddev launch* command to start your site using Docker.

# Features added
- Tailwind CSS with a plugin for it called Flowbite that allows easily creating carousels etc.
- Sidebar widget that allows a user to customize its content from the widgets menu
- Hero section with an image carousel (TODO: change to dynamic featured post content)
- Custom post category called Projects that is displayed as cards below the hero section (has its own custom section)

## How to use the CPT Projects
- Create a new post category and call it "Projects" (the URL slug should be "projects" lowercase) if it does not exist yet
- Create a new post and tag it under the category "Projects", also add a featured image if possible
- Go to the index page (featured posts page) and check if new cards for project posts are visible below the image carousel aka hero section