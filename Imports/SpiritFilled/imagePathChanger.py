import os
from bs4 import BeautifulSoup
import chardet

# Base URL for absolute paths
BASE_URL = "https://hereslife.com/sites/all/files/spirit"

# Directory containing the HTML files
root_directory = "c:/ampp/htdocs/hl-api/imports/SpiritFilled/new"

def detect_file_encoding(file_path):
    with open(file_path, 'rb') as file:
        raw_data = file.read()
    return chardet.detect(raw_data)['encoding']

def convert_paths_and_reencode(file_path, encoding):
    with open(file_path, 'r', encoding=encoding, errors='replace') as file:
        soup = BeautifulSoup(file, 'html.parser')
    
    # Get relative directory path from the root directory to the file directory
    rel_dir = os.path.relpath(os.path.dirname(file_path), root_directory)

    # Modify img tags
    for img_tag in soup.find_all('img'):
        src = img_tag.get('src')
        if src:
            # Ensure that the src doesn't mistakenly lead with a URL or an absolute path
            src = src.lstrip('/')  # Remove leading slash if present
            # Correctly concatenate the base URL, relative directory, and src
            absolute_url = '/'.join([BASE_URL.rstrip('/'), rel_dir, src]).replace('\\', '/')
            img_tag['src'] = absolute_url
    
    # Write the modified HTML in UTF-8
    with open(file_path, 'w', encoding='utf-8') as file:
        file.write(str(soup))

def process_html_files(root_dir):
    for subdir, dirs, files in os.walk(root_dir):
        for file in files:
            if file.endswith(('.htm', '.html')):
                file_path = os.path.join(subdir, file)
                encoding = detect_file_encoding(file_path)
                print(f"Processing {file} - Original Encoding: {encoding}")
                convert_paths_and_reencode(file_path, encoding)

if __name__ == "__main__":
    process_html_files(root_directory)
