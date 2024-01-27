function includeFile(fileUrl, fileType) {
  if (fileType === 'js') {
    var scriptElement = document.createElement('script');
    scriptElement.src = fileUrl;
    document.head.appendChild(scriptElement);
  } else if (fileType === 'css') {
    var linkElement = document.createElement('link');
    linkElement.rel = 'stylesheet';
    linkElement.href = fileUrl;
    document.head.appendChild(linkElement);
  }
}