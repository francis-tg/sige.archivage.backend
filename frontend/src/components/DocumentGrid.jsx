import React from 'react';
import DocumentContextMenu from './DocumentContextMenu';

const DocumentGrid = ({ documents, getFileIcon }) => (
  <div className="grid max-md:grid-cols-4 max-sm:grid-cols-1 max-h-[70vh] overflow-x-hidden overflow-y-auto md:grid-cols-5 lg:grid-cols-8 gap-5 py-8">
    {documents.map((doc, k) => (
      <DocumentContextMenu key={k} doc={doc}>
        <div className="flex flex-col items-center" title={`${doc.titre}.${doc.file_path.split('.').pop()}`}>
          <div className="text-6xl">
            {getFileIcon(doc.file_path)}
          </div>
          <div className="text-center" title={`${doc.titre}.${doc.file_path.split('.').pop()}`}>
            {`${doc.titre.substring(0, 10)}(...).${doc.file_path.split('.').pop()}`}
          </div>
        </div>
      </DocumentContextMenu>
    ))}
  </div>
);

export default DocumentGrid;
