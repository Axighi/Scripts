def change_letter(str)
    ary = str.split('')
    ary.each do |letter|
        letter = [letter.codepoints].pack('U*')
    end
    return ary.to_s
end

change_letter(STDIN.gets)
