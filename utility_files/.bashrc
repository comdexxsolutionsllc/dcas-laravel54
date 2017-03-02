alias space="du -h . --max-depth=0 --exclude=vendor --exclude=node_modules --exclude=bower"
alias tinker="php artisan tinker"
alias numberOfCommits='git log | grep commit | grep -v "first commit" | wc -l'

PATH=/home/shine/public_html/dcas/vendor/bin:/home/shine/public_html/dcas/node_modules/.bin:$PATH

export PATH;

