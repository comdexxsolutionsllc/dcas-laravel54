alias dir=ls
alias artisan="php artisan"
alias ga="git add --all ."
alias gc="git commit"
alias gl="git log"
alias gp="git push"
alias gs="git status"
alias numberOfCommits='git log | grep commit | grep -v "first commit" | wc -l'
alias space="du -h . --max-depth=0 --exclude=vendor --exclude=node_modules --exclude=bower"
alias tinker="php artisan tinker"

PATH=/home/shine/public_html/dcas/vendor/bin:/home/shine/public_html/dcas/node_modules/.bin:$PATH

export PATH;
