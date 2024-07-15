import React from 'react';
import { ContextMenuTrigger, ContextMenu, ContextMenuItem, ContextMenuContent, ContextMenuShortcut } from '../ui/ui/context-menu';
import { LuFileEdit, LuShare2, LuTrash2 } from 'react-icons/lu';

const DocumentContextMenu = ({ doc, children }) => {
    const user = JSON.parse(sessionStorage.getItem("user"))
    return (
        <ContextMenu>
          <ContextMenuTrigger>
            {children}
          </ContextMenuTrigger>
          {user?.role !==null ?
          <ContextMenuContent className="w-64">
            <ContextMenuItem inset>
              Partager le document
              <ContextMenuShortcut><LuShare2 /></ContextMenuShortcut>
            </ContextMenuItem>
            <ContextMenuItem inset disabled={user?.role !=="Administrator"}>
              Renommer le document
              <ContextMenuShortcut><LuFileEdit /></ContextMenuShortcut>
            </ContextMenuItem>
            <ContextMenuItem inset >
              <div className="text-red-500" disabled={user?.role !=="Administrator"}>
                Supprimer le document
              </div>
              <ContextMenuShortcut><LuTrash2 /></ContextMenuShortcut>
            </ContextMenuItem>
          </ContextMenuContent>
          :''}
        </ContextMenu>
      );
}

export default DocumentContextMenu;
