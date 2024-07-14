import React from 'react';
import { IoApps, IoList } from 'react-icons/io5';

const ViewToggleButtons = ({ view, setView }) => (
  <div className='flex items-end justify-end'>
    <div>
      <button onClick={() => setView('grid')} className={view === "grid" ? 'btn btn-sm btn-ghost bg-amber-500/50' : 'btn btn-sm btn-ghost'}>
        <IoApps />
      </button>
      <button onClick={() => setView('list')} className={view === "list" ? 'btn btn-sm btn-ghost bg-amber-500/50' : 'btn btn-sm btn-ghost'}>
        <IoList />
      </button>
    </div>
  </div>
);

export default ViewToggleButtons;
