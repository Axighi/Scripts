def primes_sum
    ary = []
    i = 2
    while ary.size < 1001
        if is_prime(i)
            ary << i
        end
        i += 1
    end
    ary.inject{|sum, x| sum + x}
end

def is_prime(num)
    i = 2
    while i <= num
        if num % i == 0 && i != num 
            return false
        end
        return true;
    end
end

puts primes_sum
