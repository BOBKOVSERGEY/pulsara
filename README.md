#
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

# rep
https://github.com/JustSteveKing/pulsara

#  stubs
sail artisan stub:publish

# migration with seeds
sail artisan migrate:fresh --seed

