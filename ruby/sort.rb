def bubble(nums)
  for i in 1..(nums.length - 1)
    for j in 0..(nums.length - i - 1)
      if nums[j] > nums[j + 1]
        nums[j], nums[j + 1] = nums[j + 1], nums[j]
      end
    end
  end

  return nums
end

def select_sort(nums)
  for i in 0..(nums.length - 1)
    min = nums[i]
    for j in (i + 1)..(nums.length - 1)
      if nums[j] < min
        min = nums[j]
      end
    end
    nums[nums.index(min)], nums[i] = nums[i], nums[nums.index(min)]
  end

  return nums
end

# def insert(nums)
#   last_sorted_index = 0
#   for i in 1..(nums.length - 1)
#     extracted = nums[i]
#     r = last_sorted_index..0
#     for j in (r.first).downto(r.last)
#       if extracted <= nums[j]
#         nums.delete_at(i)
#         nums.insert(j, extracted)
#         break
#       end
#     end
#     last_sorted_index += 1
#   end
#
#   return nums
# end

def select_sort(array)
   array.each_with_index do |element, index|
     next if index == 0 #第一个元素默认已排序
     j = index - 1
     while j >= 0 && array[j] > element
       array[j + 1] = array[j]
       j -= 1
     end
     array[j + 1] = element
   end
   array
end

def merges_sort(array)
  def merge(left_sorted, right_sorted)
    res = []
    l = 0
    r = 0

    loop do
      break if r >= right_sorted.length and l >= left_sorted.length

      if r >= right_sorted.length or (l < left_sorted.length and left_sorted[l] < right_sorted[r])
        res << left_sorted[l]
        l += 1
      else
        res << right_sorted[r]
        r += 1
      end
    end

    return res
  end

  def mergesort_iter(array_sliced)
    return array_sliced if array_sliced.length <= 1

    mid = array_sliced.length/2 - 1
    left_sorted = mergesort_iter(array_sliced[0..mid])
    right_sorted = mergesort_iter(array_sliced[mid+1..-1])
    return merge(left_sorted, right_sorted)
  end

  mergesort_iter(array)
end

def quick(nums)
  (x=nums.pop) ? quick(nums.select { |i| i <= x }) + [x] + quick(nums.select { |i| i > x }) : []
end

nums = [23, 5, 67, 45, 4, 98, 34, 72]
# bubble(STDIN.gets)
puts select_sort(nums)
# puts insert(nums)
# puts merge(nums)
# puts quick(nums)
