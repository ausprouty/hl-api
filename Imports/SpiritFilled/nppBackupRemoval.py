import os
root_directory = "c:/ampp/htdocs/hl-api/imports/SpiritFilled/new"

# Folder name to look for and delete
target_folder_name = "npmBackup"

for subdir, dirs, files in os.walk(root_directory, topdown=False):  # Use topdown=False to modify the dirnames list in-place
    for dir_name in dirs:
        if dir_name == target_folder_name:
            full_path = os.path.join(subdir, dir_name)
            shutil.rmtree(full_path)  # Use shutil.rmtree to delete the directory
            print(f"Deleted: {full_path}")

print("Cleanup complete.")