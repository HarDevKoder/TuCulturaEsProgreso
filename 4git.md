## Documentación Git
1. [Instalación GIT](#instalación-de-git-bash)
1. [Configuración Inicial](#configuración-de-usuario-y-email)
1. [Crear Cuenta GITHUB](#creación-de-cuenta-github)
1. [Flujo Básico de Trabajo](#flujo-básico-de-trabajo)
1. [Archivo README.md](#archivo-readmemd)
1. [Archivo .gitignore](#archivo-gitignore)
1. [Comandos Básicos](#comandos-básicos)
1. [Trabajando con Ramas](#trabajando-con-ramas)
1. [](#)


## Instalación de Git Bash
1. En Google buscar GIT
1. Descargar el instalador para windows
1. ejecutar el instalador
1. siguiente, siguiente
1. seleccionar todo menos actualizaciones
1. siguiente
1. usar vscode como el editor por defecto
1. siguiente, siguiente
1. use git and optional unix tools
1. siguiente (7 times)
1. install
1. finish
1. Anclar Git Bash a la barra de tareas

[inicio](#documentación-git)

## Configuración Inicial
1. En la Terminal de Bash digitar los Comandos
1. git config --global user.name "hardevkoder"
1. git config --global user.email "haroldvaldes@yahoo.com"
1. git config --global user.ui true
1. git config --global core.autoclrf true
1. git config --global core.editor "code --wait"
1. comprobamos que todo esté correcto
1. git config --list
1. debería mostrarse al final
1. user.name=hardevkoder
1. user.email=haroldvaldes@yahoo.com
1. Para realizar cambios se realizan los comandos de nuevo y se modifican los datos deseados.  

[inicio](#documentación-git)

## Creación de Cuenta GITHUB
1. Ir al sitio https://github.com/
1. Click en Sign Up (arriba derecha)
1. Seguir las Instrucciones para crear la cuenta

[inicio](#documentación-git)

## Flujo Básico de Trabajo
+ git init --> Crea Repositorio
+ git add --> Guarda Cambios Temporalmene
+ git commit --> Registra Cambios Locales
+ git push --> Sube Cambios a Repositorio Remoto
+ git pull --> Actualiza Repositorio Local con cambios de Repositorio Remoto

[inicio](#documentación-git)

## Archivo README.md
Muestra una Descripción general del Propósito del Repositorio, se muestra al entrar al mismo.

[inicio](#documentación-git)

## Archivo .gitignore
Permite incluir los elementos que no deseamos sean incluidos en las actualizaciones realizadas a través de los commits, pull o push.
Se pueden incluir:
+ Archivo.extensión
+ Carpetas
+ *.extension

[inicio](#documentación-git)

## Comandos Básicos
+ Verificar Archivos Modificados
  + git status
+ Agregar Todos los cambios al Stage
  + git add .
+ Crear un commit
  + git commit -m 'Mensaje del commit'
+ Ver los Commits realizados
  + git log
  + Navegar entre ellos con Enter
  + Salir com q y enter
+ Ver los commits resumidos
  + git log --oneline
+ Subir Cambios a Repositorio Remoto
  + git push
+ Descargar Cambios del repositorio Remoto al Local
  + git pull 
+ Clonar Repositorio
  + git clone URL Remota 
+ Modificar último Commit sin Cambiar Mensaje
  + Realizar Cambios 
  + git add .
  + git commit --amend --no-edit
+ Modificar último Commit Cambiando Mensaje
  + Realizar Cambios 
  + git add .
  + git commit --amend -m 'Nuevo Mensaje'
  + trabajar cambios en local sin pushear
+ Eliminar Ultimo Commit y señalar al anterior
  + git reset --hard HEAD~1
+ Regresar en el tiempo a un commit anterior
  + git checkout id
+ Guardar Registro de commits (Backup)
  + git log > commits.txt

[inicio](#documentación-git)

 ## Trabajando con Ramas 
+ Crear Rama
  + git branch nombre-rama 
+ Cambiar de Rama
  + git checkout nombre-rama 
+ Crear Rama y pasarse a ella
  + git checkout -b nombre-rama
+ Eliminar Rama
  + git branch -d nombre-rama
+ Eliminar Ramas remotas
  + git push origin --delete nombre-rama-remota
+ Mostrar Ramas del Repositorio
  + git branch
+ Mostrar Ramas Fusionadas
  + git branch --merged
+ Rebasar Ramas (subir a la cabeza del Repositorio)
  + git checkout Rama-secundaria
  + git rebase Rama-primaria
+ Trackear cambios de Ramas diferentes a Main
  + git push -u origin nueva-rama
+ Fusionar Ramas Con Main (Fast- Forward o automatica)
  + git checkout nombre-rama (rama que conserva los cambios main)
  + git merge nombre-rama (rama que se va a unir a la main)
+ Fusionar Ramas Con Conflictos (Forma manual o con Conflictos)
  + git checkout nombre-rama (rama que conserva los cambios main)
  + Resolver en el editor o manualmente
  + Combinar Cambios 
  + Aceptar el merge
  + Git add .
  + Git commit -m 'mensaje'
  + git push

[inicio](#documentación-git)



