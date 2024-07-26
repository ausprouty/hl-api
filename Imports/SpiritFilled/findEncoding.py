import os
import chardet

def detect_file_encoding(file_path):
    with open(file_path, 'rb') as file:
        raw_data = file.read()
    return chardet.detect(raw_data)['encoding']

def crawl_directory_for_html(root_dir):
    for subdir, dirs, files in os.walk(root_dir):
        for file in files:
            if file.endswith('.html', '.htm'):
                file_path = os.path.join(subdir, file)
                encoding = detect_file_encoding(file_path)
                print(f"File: {file_path} - Encoding: {encoding}")

if __name__ == "__main__":
    root_directory = "c:/ampp/htdocs/hl-api/imports/SpiritFilled/new"  # Update this path to your directory
    crawl_directory_for_html(root_directory)
