class EmailAddress
      include Comparable

        def initialize(string)
                if string =~ /@/
                          @raw_email_address = string.downcase.strip
                        else
                                  raise ArgumentError, "email address must have an '@'"
                                      end
                  end

          def <=>(other)
                  raw_email_address <=> other.to_s
                    end

            def to_s
                    raw_email_address
                      end

              protected

                attr_reader :raw_email_address
end
